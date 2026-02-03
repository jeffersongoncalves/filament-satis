<?php

namespace JeffersonGoncalves\FilamentSatis\Commands;

use Illuminate\Console\Command;
use JeffersonGoncalves\FilamentSatis\Jobs\ValidateTenantSatisBuild;

class SatisValidate extends Command
{
    protected $signature = 'satis:validate {--tenant= : Validate for a specific tenant ID}';

    protected $description = 'Validate Satis repository builds and package credentials';

    public function handle(): int
    {
        $tenantId = $this->option('tenant');

        if (config('filament-satis.tenancy.enabled') && ! $tenantId) {
            $tenantModel = config('filament-satis.tenancy.model');
            $tenants = $tenantModel::all();

            foreach ($tenants as $tenant) {
                ValidateTenantSatisBuild::dispatch($tenant->getKey());
                $this->info("Dispatched validation for tenant: {$tenant->getKey()}");
            }
        } else {
            ValidateTenantSatisBuild::dispatch($tenantId ? (int) $tenantId : null);
            $this->info('Dispatched Satis validation job.');
        }

        return self::SUCCESS;
    }
}
