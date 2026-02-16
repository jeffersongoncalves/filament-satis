<?php

namespace JeffersonGoncalves\FilamentSatis;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSatisServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-satis';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile();
    }
}
