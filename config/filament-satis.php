<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Multi-Tenancy
    |--------------------------------------------------------------------------
    |
    | When enabled, all data (packages, tokens) is isolated per tenant.
    | The tenant model must implement the required relationship or have
    | the foreign key configured below.
    |
    */
    'tenancy' => [
        'enabled' => false,
        'model' => null,
        'foreign_key' => null,
        'ownership_relationship' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Table Prefix
    |--------------------------------------------------------------------------
    |
    | Prefix applied to all tables created by the plugin to avoid
    | collision with existing application tables.
    |
    */
    'table_prefix' => 'satis_',

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Models used by the plugin. Can be overridden to extend the default
    | behavior. Custom models must extend the originals.
    |
    */
    'models' => [
        'package' => \JeffersonGoncalves\FilamentSatis\Models\Package::class,
        'token' => \JeffersonGoncalves\FilamentSatis\Models\Token::class,
        'dependency' => \JeffersonGoncalves\FilamentSatis\Models\Dependency::class,
        'package_release' => \JeffersonGoncalves\FilamentSatis\Models\PackageRelease::class,
        'package_download' => \JeffersonGoncalves\FilamentSatis\Models\PackageDownload::class,
        'packagist' => \JeffersonGoncalves\FilamentSatis\Models\Packagist::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Storage
    |--------------------------------------------------------------------------
    |
    | Disk and path where Satis builds are stored.
    | Compatible with any Laravel filesystem driver.
    |
    */
    'storage_disk' => 'local',
    'storage_path' => 'satis',

    /*
    |--------------------------------------------------------------------------
    | Satis Binary
    |--------------------------------------------------------------------------
    |
    | Path to the Satis binary. When null, uses the binary included
    | as a package dependency (vendor/bin/satis).
    |
    */
    'satis_binary' => null,

    /*
    |--------------------------------------------------------------------------
    | Satis Base Config
    |--------------------------------------------------------------------------
    |
    | Base satis.json configuration generated on each build.
    | Merged with repositories and requires from each build.
    |
    */
    'satis' => [
        'name' => 'my/repository',
        'output_html' => false,
        'archive' => [
            'directory' => 'archives',
            'skip_dev' => true,
        ],
        'minimum_stability' => 'stable',
        'secure_http' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Queue
    |--------------------------------------------------------------------------
    |
    | Queue configuration for build and processing jobs.
    | When null, uses the application defaults.
    |
    */
    'queue' => [
        'connection' => null,
        'queue_name' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Schedule
    |--------------------------------------------------------------------------
    |
    | Frequency of scheduled commands. Accepts Laravel Schedule methods
    | (weekly, hourly, daily, etc.) or null to disable.
    |
    */
    'schedule' => [
        'build' => 'weekly',
        'validate' => 'hourly',
        'dependencies' => 'weekly',
    ],

    /*
    |--------------------------------------------------------------------------
    | Auth
    |--------------------------------------------------------------------------
    |
    | Guard and provider for Composer token authentication.
    | Automatically registered by the plugin in auth config.
    |
    */
    'auth' => [
        'guard' => 'satis-token',
        'provider' => 'satis-tokens',
    ],

    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    |
    | Prefixes and middleware for plugin routes.
    |
    */
    'routes' => [
        'api_prefix' => 'api/satis',
        'composer_prefix' => 'satis',
        'middleware' => ['api'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    |
    | Navigation configuration for Resources in the Filament panel.
    |
    */
    'navigation' => [
        'group' => 'Satis',
        'icon' => 'heroicon-o-archive-box',
        'sort' => 50,
    ],
];
