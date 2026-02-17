<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Pages;

use Filament\Resources\Pages\CreateRecord;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\PackageResource;
use JeffersonGoncalves\LaravelSatis\Jobs\SyncTenantPackages;

class CreatePackage extends CreateRecord
{
    protected static string $resource = PackageResource::class;

    protected function afterCreate(): void
    {
        if (config('satis.tenancy.enabled')) {
            $tenantId = config('satis.tenancy.resolver') ? call_user_func(config('satis.tenancy.resolver')) : null;
            SyncTenantPackages::dispatch($tenantId)->delay(now()->addSeconds(5));
        }
    }
}
