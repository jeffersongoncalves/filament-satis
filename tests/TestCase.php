<?php

namespace JeffersonGoncalves\FilamentSatis\Tests;

use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Schemas\SchemasServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JeffersonGoncalves\FilamentSatis\FilamentSatisServiceProvider;
use JeffersonGoncalves\LaravelSatis\LaravelSatisServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            SchemasServiceProvider::class,
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

        // Load laravel-satis config manually for testing
        $laravelSatisConfig = __DIR__.'/../vendor/jeffersongoncalves/laravel-satis/config/laravel-satis.php';
        if (file_exists($laravelSatisConfig)) {
            $app['config']->set('laravel-satis', require $laravelSatisConfig);
        }
    }

    protected function defineDatabaseMigrations(): void
    {
        $migrationsPath = __DIR__.'/../vendor/jeffersongoncalves/laravel-satis/database/migrations';

        if (is_dir($migrationsPath)) {
            foreach (glob($migrationsPath.'/*.php.stub') as $stub) {
                $migrationPath = str_replace('.php.stub', '.php', $stub);
                if (! file_exists($migrationPath)) {
                    copy($stub, $migrationPath);
                }
            }

            $this->loadMigrationsFrom($migrationsPath);
        }
    }
}
