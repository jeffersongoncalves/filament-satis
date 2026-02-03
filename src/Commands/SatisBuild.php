<?php

namespace JeffersonGoncalves\FilamentSatis\Commands;

use Illuminate\Console\Command;
use JeffersonGoncalves\FilamentSatis\Jobs\SyncTenantPackages;

class SatisBuild extends Command
{
    protected $signature = 'satis:build {--tenant= : Build for a specific tenant ID}';

    protected $description = 'Build Satis repository packages';

    public function handle(): int
    {
        $tenantId = $this->option('tenant');

        if (config('filament-satis.tenancy.enabled') && ! $tenantId) {
            $tenantModel = config('filament-satis.tenancy.model');
            $tenants = $tenantModel::all();

            foreach ($tenants as $tenant) {
                SyncTenantPackages::dispatch($tenant->getKey());
                $this->info("Dispatched build for tenant: {$tenant->getKey()}");
            }
        } else {
            SyncTenantPackages::dispatch($tenantId ? (int) $tenantId : null);
            $this->info('Dispatched Satis build job.');
        }

        return self::SUCCESS;
    }
}
