# Filament Satis

A [Filament](https://filamentphp.com) plugin for managing private Composer repositories powered by [Satis](https://github.com/composer/satis).

## Features

- **Package Management** — Add and manage Composer & GitHub package sources with CRUD operations
- **Token-Based Auth** — Secure access with per-token package scoping
- **Version Tracking** — Automatic tracking of package releases synced from Satis builds
- **Download Statistics** — Per-version download tracking and analytics
- **Dependency Mapping** — Public/private dependency classification from package releases
- **Multi-Tenancy** — Tenant-isolated data with configurable foreign keys
- **Credential Validation** — Verify package accessibility with tracked validation timestamps
- **GitHub Webhooks** — Auto-rebuild on push events with HMAC-SHA256 signature validation
- **Per-Resource Config** — Customize navigation, icons, slugs, clusters, and visibility per resource
- **Bilingual** — English and Brazilian Portuguese translations included
- **Laravel Boost** — AI guidelines and skills for assisted development

## Requirements

- PHP 8.2+
- Laravel 12+
- Filament 5.0+

## Upgrading from 2.x

If you are upgrading from `2.x` (Filament v4), the main change is Livewire v4 support. No breaking changes in the Filament API. See the [CHANGELOG](CHANGELOG.md) for details.

> **Note:** If you need Filament v4 support, use the [`2.x` branch](https://github.com/jeffersongoncalves/filament-satis/tree/2.x).

## Upgrading from 1.x

If you are upgrading from `1.x` (Filament v3), see the [CHANGELOG](CHANGELOG.md) for a full list of breaking changes and the namespace migration guide.

> **Note:** If you need Filament v3 support, use the [`1.x` branch](https://github.com/jeffersongoncalves/filament-satis/tree/1.x).

## Installation

### 1. Require the packages

```bash
composer require jeffersongoncalves/filament-satis
```

This will automatically install `jeffersongoncalves/laravel-satis` as a dependency.

### 2. Publish and run migrations

```bash
php artisan vendor:publish --tag="satis-migrations"
php artisan migrate
```

### 3. Publish the config (optional)

```bash
php artisan vendor:publish --tag="filament-satis-config"
php artisan vendor:publish --tag="satis-config"
```

## Quick Start

### 1. Register the plugin

Add the plugin to your Filament panel provider:

```php
use JeffersonGoncalves\FilamentSatis\FilamentSatisPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentSatisPlugin::make(),
        ]);
}
```

### 2. Create packages and tokens

1. Navigate to **Satis > Packages** in the admin panel
2. Add a package with its repository URL
3. Navigate to **Satis > Tokens** and create an authentication token
4. Associate the token with the packages it should access

### 3. Build the repository

```bash
php artisan satis:build
```

### 4. Configure your client

In your client project's `composer.json`:

```json
{
    "repositories": [
        {
            "type": "composer",
            "url": "https://your-app.com/satis"
        }
    ]
}
```

Authenticate with the token:

```bash
composer config http-basic.your-app.com token "your-64-char-token-here"
```

## Multi-Tenancy

Enable tenant isolation for packages, tokens, and builds:

```php
use JeffersonGoncalves\FilamentSatis\FilamentSatisPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentSatisPlugin::make()
                ->tenancy(
                    enabled: true,
                    model: \App\Models\Team::class,
                    foreignKey: 'team_id'
                ),
        ]);
}
```

The plugin automatically:
- Sets the `laravel-satis` tenancy configuration during `register()`
- Configures the tenant resolver using `filament()->getTenant()` during `boot()`
- Scopes all queries and auto-sets the foreign key on creation

## Configuration

### Filament Plugin Config

The `config/filament-satis.php` file provides per-resource customization:

```php
return [
    // Shared navigation group for all resources
    'navigation_group' => 'Satis',

    // Per-resource configuration
    'package_resource' => [
        'cluster' => null,                        // Filament cluster class
        'should_register_navigation' => true,     // Show in sidebar
        'navigation_icon' => 'heroicon-o-cube',   // Heroicon name
        'navigation_sort' => 1,                   // Sort order
        'slug' => 'satis/packages',               // URL slug
    ],

    'token_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-key',
        'navigation_sort' => 2,
        'slug' => 'satis/tokens',
    ],

    'package_release_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-tag',
        'navigation_sort' => 3,
        'slug' => 'satis/package-releases',
    ],

    'package_download_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-arrow-down-tray',
        'navigation_sort' => 4,
        'slug' => 'satis/package-downloads',
    ],

    'dependency_resource' => [
        'cluster' => null,
        'should_register_navigation' => true,
        'navigation_icon' => 'heroicon-o-link',
        'navigation_sort' => 5,
        'slug' => 'satis/dependencies',
    ],
];
```

### Laravel Satis Config

The `config/satis.php` file configures the core backend:

```php
return [
    // Multi-tenancy
    'tenancy' => [
        'enabled' => false,
        'model' => null,
        'foreign_key' => null,
        'resolver' => null,
    ],

    // Database table prefix
    'table_prefix' => 'satis_',

    // Override default model classes
    'models' => [
        'package' => \JeffersonGoncalves\LaravelSatis\Models\Package::class,
        'token' => \JeffersonGoncalves\LaravelSatis\Models\Token::class,
        // ...
    ],

    // Storage for Satis builds
    'storage_disk' => 'local',
    'storage_path' => 'satis',

    // Satis build configuration
    'satis' => [
        'name' => 'my/repository',
        'output_html' => false,
        'archive' => ['directory' => 'archives', 'skip_dev' => true],
        'minimum_stability' => 'stable',
    ],

    // Queue settings
    'queue' => ['connection' => null, 'queue_name' => null],

    // Scheduled command frequencies
    'schedule' => [
        'build' => 'weekly',
        'validate' => 'hourly',
        'dependencies' => 'weekly',
    ],

    // Auth guard and provider
    'auth' => ['guard' => 'satis-token', 'provider' => 'satis-tokens'],

    // Route prefixes and middleware
    'routes' => [
        'api_prefix' => 'api/satis',
        'composer_prefix' => 'satis',
        'middleware' => ['api'],
    ],
];
```

## Resources

The plugin registers 5 Filament resources:

| Resource | Operations | Description |
|----------|-----------|-------------|
| **PackageResource** | List, Create, View, Edit, Delete | Manage Composer & GitHub package sources |
| **TokenResource** | List, Create, View, Edit, Delete | Manage authentication tokens with package scoping |
| **PackageReleaseResource** | List, View | View package versions synced from Satis builds |
| **PackageDownloadResource** | List | View per-version download statistics |
| **DependencyResource** | List, View | View public/private dependency mapping |

### Relation Managers

- **PackageResource** includes `ReleasesRelationManager` and `DownloadsRelationManager`
- **DependencyResource** includes `PackageReleasesRelationManager`

## Customization Examples

### Hide a resource from navigation

```php
// config/filament-satis.php
'package_download_resource' => [
    'should_register_navigation' => false,
    // ...
],
```

### Change navigation icons

```php
'package_resource' => [
    'navigation_icon' => 'heroicon-o-archive-box',
    // ...
],
```

### Group resources in a cluster

```php
'package_resource' => [
    'cluster' => \App\Filament\Clusters\SatisCluster::class,
    // ...
],
'token_resource' => [
    'cluster' => \App\Filament\Clusters\SatisCluster::class,
    // ...
],
```

### Change the navigation group

```php
'navigation_group' => 'Package Management',
```

### Override model classes

```php
// config/satis.php
'models' => [
    'package' => \App\Models\CustomPackage::class,
],
```

Custom models must extend the base models from the package.

## Translations

The plugin includes English and Brazilian Portuguese translations.

### Publish translations

```bash
php artisan vendor:publish --tag="filament-satis-translations"
```

Translation files use the `filament-satis::` namespace:

```php
__('filament-satis::package.navigation_label')
__('filament-satis::package.fields.name')
__('filament-satis::general.created_at')
```

## Commands

| Command | Description |
|---------|-------------|
| `php artisan satis:build` | Build Satis repository from registered packages |
| `php artisan satis:build --tenant=1` | Build for a specific tenant |
| `php artisan satis:validate` | Validate builds and package credentials |
| `php artisan dependency:packages` | Process and sync package dependencies |

## GitHub Webhooks

Each package auto-generates a `webhook_secret` and `reference`. Configure your GitHub webhook:

- **URL:** `https://your-app.com/api/satis/webhooks/github/{reference}`
- **Secret:** The `webhook_secret` from the package edit form
- **Events:** Push
- **Content Type:** `application/json`

## Laravel Boost Integration

This package includes [Laravel Boost](https://laravel.com/docs/12.x/boost) guidelines and skills for AI-assisted development. When Boost is installed in your project, run:

```bash
php artisan boost:install
```

The plugin's AI guidelines and skills will be automatically detected and available to your coding agent.

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
