<?php

namespace JeffersonGoncalves\FilamentSatis\Observers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\FilamentSatis\Jobs\SyncTokenPackages;
use JeffersonGoncalves\FilamentSatis\Models\Token;

class TokenObserver
{
    public function creating(Token $token): void
    {
        if (empty($token->token)) {
            $token->token = $token::generateToken();
        }
    }

    public function created(Token $token): void
    {
        $this->clearCache();

        SyncTokenPackages::dispatch($token);
    }

    public function deleted(Token $token): void
    {
        $this->clearCache();

        $disk = Storage::disk(config('filament-satis.storage_disk'));
        $storagePath = config('filament-satis.storage_path', 'satis');

        $tenantPrefix = '';
        if (config('filament-satis.tenancy.enabled')) {
            $fk = config('filament-satis.tenancy.foreign_key');
            $tenantId = $token->{$fk} ?? null;
            if ($tenantId) {
                $tenantPrefix = $tenantId.'/';
            }
        }

        $tokenPath = $storagePath.'/'.$tenantPrefix.$token->id;

        if ($disk->exists($tokenPath)) {
            $disk->deleteDirectory($tokenPath);
        }
    }

    protected function clearCache(): void
    {
        Cache::forget('filament-satis:tokens');
        Cache::forget('filament-satis:tokens-count');
    }
}
