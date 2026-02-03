<?php

namespace JeffersonGoncalves\FilamentSatis;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Auth;
use JeffersonGoncalves\FilamentSatis\Commands\DependencyPackages;
use JeffersonGoncalves\FilamentSatis\Commands\SatisBuild;
use JeffersonGoncalves\FilamentSatis\Commands\SatisValidate;
use JeffersonGoncalves\FilamentSatis\Observers\DependencyObserver;
use JeffersonGoncalves\FilamentSatis\Observers\PackageDownloadObserver;
use JeffersonGoncalves\FilamentSatis\Observers\PackageObserver;
use JeffersonGoncalves\FilamentSatis\Observers\PackageReleaseObserver;
use JeffersonGoncalves\FilamentSatis\Observers\TokenObserver;
use JeffersonGoncalves\FilamentSatis\Providers\EloquentTokenProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSatisServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-satis';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews()
            ->hasMigrations([
                'create_satis_packages_table',
                'create_satis_tokens_table',
                'create_satis_package_token_table',
                'create_satis_package_releases_table',
                'create_satis_dependencies_table',
                'create_satis_dependency_package_release_table',
                'create_satis_package_downloads_table',
                'create_satis_packagists_table',
            ])
            ->hasRoutes(['api', 'composer'])
            ->hasCommands([
                SatisBuild::class,
                SatisValidate::class,
                DependencyPackages::class,
            ]);
    }

    public function packageBooted(): void
    {
        $this->registerAuthProvider();
        $this->registerObservers();
        $this->registerSchedule();
    }

    protected function registerAuthProvider(): void
    {
        Auth::provider(
            config('filament-satis.auth.provider'),
            fn ($app, $config) => new EloquentTokenProvider(
                $app['hash'],
                config('filament-satis.models.token')
            )
        );

        config([
            'auth.guards.'.config('filament-satis.auth.guard') => [
                'driver' => 'session',
                'provider' => config('filament-satis.auth.provider'),
            ],
            'auth.providers.'.config('filament-satis.auth.provider') => [
                'driver' => config('filament-satis.auth.provider'),
                'model' => config('filament-satis.models.token'),
            ],
        ]);
    }

    protected function registerObservers(): void
    {
        $models = config('filament-satis.models');

        $models['package']::observe(PackageObserver::class);
        $models['token']::observe(TokenObserver::class);
        $models['dependency']::observe(DependencyObserver::class);
        $models['package_download']::observe(PackageDownloadObserver::class);
        $models['package_release']::observe(PackageReleaseObserver::class);
    }

    protected function registerSchedule(): void
    {
        $schedule = config('filament-satis.schedule');

        if (! $schedule) {
            return;
        }

        $this->app->booted(function () use ($schedule) {
            $s = $this->app->make(Schedule::class);

            if ($schedule['build'] ?? null) {
                $s->command('satis:build')->{$schedule['build']}();
            }

            if ($schedule['validate'] ?? null) {
                $s->command('satis:validate')->{$schedule['validate']}();
            }

            if ($schedule['dependencies'] ?? null) {
                $s->command('dependency:packages')->{$schedule['dependencies']}();
            }
        });
    }
}
