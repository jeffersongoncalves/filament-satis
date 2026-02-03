<?php

namespace JeffersonGoncalves\FilamentSatis\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\FilamentSatis\Actions\ProcessPackageDependency as ProcessPackageDependencyAction;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class ProcessPackageDependency implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 1;

    public int $timeout = 300;

    public function __construct()
    {
        $queueConfig = config('filament-satis.queue');

        if ($queueConfig['connection'] ?? null) {
            $this->onConnection($queueConfig['connection']);
        }

        if ($queueConfig['queue_name'] ?? null) {
            $this->onQueue($queueConfig['queue_name']);
        }
    }

    public function handle(ProcessPackageDependencyAction $action): void
    {
        $disk = Storage::disk(config('filament-satis.storage_disk'));
        $storagePath = config('filament-satis.storage_path', 'satis');

        $packageModel = ModelResolver::package();
        $packages = $packageModel::withoutGlobalScopes()->get();

        foreach ($packages as $package) {
            $this->processPackageDependencies($disk, $storagePath, $package, $action);
        }
    }

    protected function processPackageDependencies($disk, string $storagePath, $package, ProcessPackageDependencyAction $action): void
    {
        $tenantPrefix = '';
        if (config('filament-satis.tenancy.enabled')) {
            $fk = config('filament-satis.tenancy.foreign_key');
            $tenantId = $package->{$fk} ?? null;
            if ($tenantId) {
                $tenantPrefix = $tenantId.'/';
            }
        }

        $buildPath = $storagePath.'/'.$tenantPrefix.'tenant';
        $packagesJson = $buildPath.'/packages.json';

        if (! $disk->exists($packagesJson)) {
            return;
        }

        $content = json_decode($disk->get($packagesJson), true);
        $packagesData = $content['packages'] ?? [];

        if (! isset($packagesData[$package->name])) {
            return;
        }

        $releaseModel = ModelResolver::packageRelease();

        foreach ($packagesData[$package->name] as $versionData) {
            $version = $versionData['version'] ?? null;

            if (! $version) {
                continue;
            }

            $release = $releaseModel::updateOrCreate(
                [
                    'package_id' => $package->id,
                    'version' => $version,
                ],
                [
                    'time' => $versionData['time'] ?? null,
                    'type' => $versionData['type'] ?? null,
                    'description' => $versionData['description'] ?? null,
                    'homepage' => $versionData['homepage'] ?? null,
                ]
            );

            $requires = $versionData['require'] ?? [];
            $action->execute($release, $requires);
        }
    }
}
