<?php

namespace JeffersonGoncalves\FilamentSatis\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\FilamentSatis\Models\Token;
use JeffersonGoncalves\FilamentSatis\Support\SatisConfig;

class SyncTokenPackages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 1;

    public int $timeout = 600;

    public function __construct(
        protected Token $token
    ) {
        $queueConfig = config('filament-satis.queue');

        if ($queueConfig['connection'] ?? null) {
            $this->onConnection($queueConfig['connection']);
        }

        if ($queueConfig['queue_name'] ?? null) {
            $this->onQueue($queueConfig['queue_name']);
        }
    }

    public function handle(): void
    {
        $packages = $this->token->packages;

        if ($packages->isEmpty()) {
            return;
        }

        $disk = Storage::disk(config('filament-satis.storage_disk'));
        $storagePath = config('filament-satis.storage_path', 'satis');

        $tenantPrefix = '';
        if (config('filament-satis.tenancy.enabled')) {
            $fk = config('filament-satis.tenancy.foreign_key');
            $tenantId = $this->token->{$fk} ?? null;
            if ($tenantId) {
                $tenantPrefix = $tenantId.'/';
            }
        }

        $buildPath = $storagePath.'/'.$tenantPrefix.$this->token->id;

        // Generate satis.json for this token's packages
        $satisConfig = SatisConfig::make()
            ->setPackages($packages)
            ->setHomepage(url(config('filament-satis.routes.composer_prefix', 'satis')));

        $configPath = $buildPath.'/satis.json';
        $disk->put($configPath, $satisConfig->toJson());

        // Run satis build
        $satisBinary = config('filament-satis.satis_binary') ?? base_path('vendor/bin/satis');
        $fullConfigPath = $disk->path($configPath);
        $fullBuildPath = $disk->path($buildPath);

        $result = Process::timeout($this->timeout)->run([
            'php', $satisBinary, 'build', $fullConfigPath, $fullBuildPath,
        ]);

        if (! $result->successful()) {
            Log::error('Satis token build failed', [
                'token_id' => $this->token->id,
                'output' => $result->errorOutput(),
            ]);
        }
    }
}
