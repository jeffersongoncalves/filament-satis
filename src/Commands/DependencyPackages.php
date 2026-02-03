<?php

namespace JeffersonGoncalves\FilamentSatis\Commands;

use Illuminate\Console\Command;
use JeffersonGoncalves\FilamentSatis\Jobs\ProcessPackageDependency;

class DependencyPackages extends Command
{
    protected $signature = 'dependency:packages';

    protected $description = 'Process and sync package dependencies from Satis builds';

    public function handle(): int
    {
        ProcessPackageDependency::dispatch();

        $this->info('Dispatched dependency processing job.');

        return self::SUCCESS;
    }
}
