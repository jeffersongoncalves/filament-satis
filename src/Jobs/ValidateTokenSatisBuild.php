<?php

namespace JeffersonGoncalves\FilamentSatis\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\FilamentSatis\Models\Token;

class ValidateTokenSatisBuild implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 1;

    public int $timeout = 120;

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
        $packagesJson = $buildPath.'/packages.json';

        if (! $disk->exists($packagesJson)) {
            // No build exists, trigger one
            SyncTokenPackages::dispatch($this->token);

            return;
        }

        $content = json_decode($disk->get($packagesJson), true);

        if (empty($content) || ! isset($content['packages'])) {
            SyncTokenPackages::dispatch($this->token);
        }
    }
}
