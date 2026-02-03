# Filament Satis

A [Filament](https://filamentphp.com) plugin for managing private Composer repositories powered by [Satis](https://github.com/composer/satis).

## Features

- **Package Management** — Add and manage Composer & GitHub package sources
- **Token-Based Auth** — Secure access with per-token package scoping
- **Automated Builds** — Queue-driven Satis builds with configurable scheduling
- **GitHub Webhooks** — Auto-rebuild on push events
- **Download Tracking** — Per-version download statistics
- **Dependency Tracking** — Public/private dependency classification
- **Multi-Tenancy** — Tenant-isolated data with configurable foreign keys
- **Credential Validation** — Verify package accessibility before building

## Requirements

- PHP 8.1+
- Laravel 10+
- Filament 3.0+
- Satis (`composer/satis` — included as dependency)

## Installation

This package is distributed via [Privato](https://privato.pub). After purchasing a license, follow these steps:

**1. Configure the Composer repository:**

```bash
composer config repositories.jeffersongoncalves composer https://jsg-tecnologia.privato.pub/composer
```

**2. Authenticate with Privato:**

```bash
composer config --auth http-basic.jsg-tecnologia.privato.pub "<EMAIL>" "<KEY>"
```

**3. Require the package:**

```bash
composer require jeffersongoncalves/filament-satis
```

**4. Publish and run migrations:**

```bash
php artisan vendor:publish --tag="filament-satis-migrations"
php artisan migrate
```

**5. Publish the config (optional):**

```bash
php artisan vendor:publish --tag="filament-satis-config"
```

## Quick Start

1. Register the plugin in your Filament panel:

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

2. Add a package in the admin panel
3. Create a token for Composer authentication
4. Run your first build:

```bash
php artisan satis:build
```

5. Configure your client's `composer.json` to use your new repository

## Documentation

Full documentation is available at the [documentation site](https://filament-satis.pages.dev).

## Commands

| Command | Description |
|---------|-------------|
| `satis:build` | Build Satis repository from packages |
| `satis:validate` | Validate package credentials |
| `dependency:packages` | Process package dependencies |

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
