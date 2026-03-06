<div class="filament-hidden">

![Filament Satis](https://raw.githubusercontent.com/jeffersongoncalves/filament-satis/3.x/art/jeffersongoncalves-filament-satis.png)

</div>

# Filament Satis

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-satis.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-satis)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-satis/tests.yml?branch=3.x&label=tests&style=flat-square)](https://github.com/jeffersongoncalves/filament-satis/actions?query=workflow%3Atests+branch%3A3.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-satis/fix-php-code-style-issues.yml?branch=3.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-satis/actions?query=workflow%3Afix-php-code-style-issues+branch%3A3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-satis.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-satis)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-satis.svg?style=flat-square)](LICENSE.md)

A [Filament](https://filamentphp.com) plugin for managing private Composer repositories powered by [Satis](https://github.com/composer/satis).

## Features

- **Package Management** — Add and manage Composer & GitHub package sources with CRUD operations
- **Token-Based Auth** — Secure access with per-token package scoping
- **Dev Packages** — Mark packages as development-only with `is_dev` flag
- **Version Tracking** — Automatic tracking of package releases synced from Satis builds
- **Download Statistics** — Per-version download tracking and analytics
- **Dependency Mapping** — Public/private dependency classification from package releases
- **Multi-Tenancy** — Tenant-isolated data with configurable foreign keys
- **Credential Validation** — Verify package accessibility with tracked validation timestamps
- **Intelligent Validation** — Timestamp-based comparison to skip unnecessary rebuilds
- **Auth.json Support** — Automatic auth.json generation for authenticated Composer builds
- **Credential Sanitization** — Remove transport-options from Satis JSON files to prevent credential leaks
- **GitHub Webhooks** — Auto-rebuild on push, release and create events with HMAC-SHA256 signature validation
- **Per-Resource Config** — Customize navigation, icons, slugs, clusters, and visibility per resource
- **Global Search** — Search packages, tokens, releases, and dependencies from the global search bar
- **Bilingual** — English and Brazilian Portuguese translations included
- **Laravel Boost** — AI guidelines and skills for assisted development

## Version Compatibility

| Plugin Version | Filament | Laravel | PHP |
|---------------|----------|---------|-----|
| 1.x | ^3.0 | ^10 \| ^11 \| ^12 | ^8.1 |
| 2.x | ^4.0 | ^11.0 | ^8.2 |
| 3.x | ^5.0 | ^11.28 | ^8.3 |

## Requirements

- PHP `^8.3`
- Laravel `^11.28`
- Filament `^5.0`
- [jeffersongoncalves/laravel-satis](https://github.com/jeffersongoncalves/laravel-satis) `^1.0`

## Installation

You can install the package via composer:

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
- Sets the `satis` tenancy configuration during `register()`
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
        'ownership_relationship' => null,
        'resolver' => null,
    ],

    // Database table prefix (set to null for unprefixed tables)
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
        'secure_http' => false,
    ],

    // Queue settings
    'queue' => [
        'connection' => null,
        'queue_name' => null,
        'timeout' => 86400, // 24 hours
    ],

    // Scheduled command frequencies
    'schedule' => [
        'build' => 'weekly',
        'token_build' => 'weekly',
        'validate' => 'hourly',
        'sanitize' => 'daily',
        'dependencies' => 'weekly',
    ],

    // Auth guard and provider
    'auth' => ['guard' => 'satis-token', 'provider' => 'satis-tokens'],

    // Route prefixes and middleware (set composer_prefix to null for no prefix)
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
| `php artisan satis:build` | Build Satis repository (tenant-based) |
| `php artisan satis:build --tenant=1` | Build for a specific tenant |
| `php artisan satis:token-build` | Build Satis repository (token-based) |
| `php artisan satis:token-build --token=5` | Build for a specific token |
| `php artisan satis:validate` | Validate builds and trigger rebuilds if needed |
| `php artisan satis:clean` | Clean all Satis builds from storage |
| `php artisan satis:clean --force` | Force clean without confirmation |
| `php artisan satis:sanitize` | Remove credentials from Satis JSON files |
| `php artisan dependency:packages` | Process and sync package dependencies |

## GitHub Webhooks

Each package auto-generates a `webhook_secret` and `reference`. Configure your GitHub webhook:

- **URL:** `https://your-app.com/api/satis/webhooks/github/{reference}`
- **Secret:** The `webhook_secret` from the package edit form
- **Events:** Push, Release, Create
- **Content Type:** `application/json`

The webhook handler:
1. Validates the package is a GitHub type
2. Filters supported events (`push`, `release`, `create`)
3. Verifies HMAC-SHA256 signature when a secret is configured
4. Dispatches tenant and token rebuilds

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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Goncalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
