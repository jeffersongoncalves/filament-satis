<?php

namespace JeffersonGoncalves\FilamentSatis\Observers;

use Illuminate\Support\Facades\Cache;
use JeffersonGoncalves\FilamentSatis\Models\Package;

class PackageObserver
{
    public function creating(Package $package): void
    {
        if (empty($package->webhook_secret)) {
            $package->webhook_secret = $package::generateWebhookSecret();
        }

        if (empty($package->reference)) {
            $package->reference = $package::generateReference();
        }
    }

    public function created(Package $package): void
    {
        $this->clearCache();
    }

    public function updated(Package $package): void
    {
        if ($package->isDirty(['username', 'password', 'url'])) {
            $package->updateQuietly([
                'is_credentials_validated' => false,
                'credentials_validated_at' => null,
            ]);
        }

        $this->clearCache();
    }

    public function deleted(Package $package): void
    {
        $this->clearCache();
    }

    protected function clearCache(): void
    {
        Cache::forget('filament-satis:packages');
        Cache::forget('filament-satis:packages-count');
    }
}
