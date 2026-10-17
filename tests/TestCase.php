<?php

namespace JeffersonGoncalves\FilamentSatis\Tests;

use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JeffersonGoncalves\FilamentSatis\FilamentSatisServiceProvider;
use JeffersonGoncalves\LaravelSatis\LaravelSatisServiceProvider;
use JeffersonGoncalves\PestPluginDatabaseMigrations\LoadsPackageMigrations;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use LoadsPackageMigrations;
    use RefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            SupportServiceProvider::class,
            TablesServiceProvider::class,
            LaravelSatisServiceProvider::class,
            FilamentSatisServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        // Load satis config manually for testing
        $satisConfig = __DIR__.'/../vendor/jeffersongoncalves/laravel-satis/config/satis.php';
        if (file_exists($satisConfig)) {
            $app['config']->set('satis', require $satisConfig);
        }
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadPackageMigrations(LaravelSatisServiceProvider::class);
    }
}
