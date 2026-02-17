---
name: filament-satis-development
description: Build and work with Filament Satis plugin for managing private Composer repositories, including resources, configuration, tenancy, and UI customization.
---

# Filament Satis Development

## When to use this skill

Use this skill when:
- Registering and configuring the Filament Satis plugin in a panel
- Customizing resource navigation, icons, slugs, or clusters
- Setting up multi-tenancy for Satis resources
- Working with Package, Token, Release, Download, or Dependency resources
- Extending or overriding Filament Satis resources
- Publishing and customizing translations

## Plugin Registration

### Basic Setup

```php
use JeffersonGoncalves\FilamentSatis\FilamentSatisPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->plugin(FilamentSatisPlugin::make());
    }
}
```

### With Multi-Tenancy

```php
$panel->plugin(
    FilamentSatisPlugin::make()
        ->tenancy(
            enabled: true,
            model: \App\Models\Team::class,
            foreignKey: 'team_id'
        )
);
```

The plugin automatically:
1. Sets `satis.tenancy.enabled` to `true` during `register()`
2. Configures the tenant resolver to use `filament()->getTenant()` during `boot()`
3. Registers all 5 resources in the panel

### Plugin API

```php
FilamentSatisPlugin::make()           // Create new instance
FilamentSatisPlugin::get()            // Get registered instance
$plugin->getId()                      // Returns 'filament-satis'
$plugin->tenancy(...)                 // Configure tenancy
$plugin->hasMultiTenancy()            // Check if tenancy enabled
$plugin->getTenantModel()             // Get tenant model class
$plugin->getTenantForeignKey()        // Get tenant foreign key
```

## Resources

### PackageResource (Full CRUD)

**Pages:** ListPackages, CreatePackage, ViewPackage, EditPackage

**Form Schema:**
- Section "General": `name` (text, required, regex validation per type), `is_dev` (toggle), `type` (toggleButtons, PackageType enum, live), `url` (text, required, URL)
- Section "Credentials": `username` (text), `password` (password, revealable, dehydratedWhenFilled)
- Section "Integration" (edit only): `webhook_secret` (disabled), `reference` (disabled)

**Infolist Schema:**
- Section: name, type, url, is_dev
- Section "Credentials": is_credentials_validated (icon), credentials_validated_at
- Section "Webhook" (GitHub only): webhook_url (copyable), webhook_secret (copyable)
- Latest release: version (badge), time, type, description, homepage, dependencies repeatable

**Table Columns:** name (searchable, sortable), is_dev (icon), is_credentials_validated (icon), package_releases_count (counts), type (toggleable), url (toggleable), created_at (toggleable), updated_at (toggleable)

**Table Filters:** SelectFilter on `type` (PackageType enum)

**Actions:** View, Edit, Delete, BulkDelete, ValidateCredentials (on Edit/View)

**Global Search:** Searchable by `name`

**RelationManagers:**
- `ReleasesRelationManager` — Shows releases with infolist slideOver (version, dependencies_count, time, type)
- `DownloadsRelationManager` — Shows download stats with infolist slideOver (version, downloads)

### TokenResource (Full CRUD)

**Pages:** ListTokens, CreateToken, ViewToken, EditToken

**Form Schema:**
- Section "General": `name` (text, required), `email` (text, required, email)
- Section "Authentication" (edit only): `token` (text, disabled)
- Section "Packages": `packages` relation (Select multiple, filtered to credentials-validated packages)

**Infolist Schema:**
- Section: name, token (copyable)
- Section "Packages": packages.name (listWithLineBreaks, bulleted)

**Table Columns:** name (searchable), email (searchable), packages_count, created_at (toggleable)

**Global Search:** Searchable by `name`

**Actions:** View, Edit, Delete, BulkDelete

**Job Dispatching:** Creates dispatch `SyncTokenPackages`, edits dispatch `SyncTokenPackages`

### PackageReleaseResource (Read-only)

**Pages:** ListPackageReleases, ViewPackageRelease

**Table Columns:** package.name, version (badge, searchable, sortable), dependencies_count, time, type, description, homepage, created_at (toggleable)

**Default Sort:** created_at DESC

**Infolist:** package, version (badge), type, time, description, homepage, dependencies (repeatable with name + pivot.version badge)

**Global Search:** Searchable by `version`

### PackageDownloadResource (Read-only)

**Pages:** ListPackageDownloads, ViewPackageDownload

**Table Columns:** package.name (sortable), version (badge, searchable, sortable), downloads (badge, sortable), created_at (toggleable)

**Infolist:** package.name, version (badge), downloads (badge)

**Default Sort:** downloads DESC

### DependencyResource (Read-only)

**Pages:** ListDependencies, ViewDependency

**Table Columns:** name (searchable, sortable), type (badge, sortable), versions (badge), package_releases_count (sortable), created_at (toggleable)

**Table Filters:** SelectFilter on `type` (DependencyType enum)

**Default Sort:** name ASC

**Infolist:** name, type (badge), versions (badge)

**Global Search:** Searchable by `name`

**RelationManagers:**
- `PackageReleasesRelationManager` — Shows package releases with infolist slideOver (package.name, version, pivot.version as constraint)

## Configuration

Config file: `config/filament-satis.php`

### Navigation Group

```php
'navigation_group' => 'Satis',  // Shared by all resources
```

### Per-Resource Config

Each resource has its own section with identical keys:

```php
'package_resource' => [
    'cluster' => null,                        // Filament cluster class
    'should_register_navigation' => true,     // Show in sidebar
    'navigation_icon' => 'heroicon-o-cube',   // Heroicon name
    'navigation_sort' => 1,                   // Sort order
    'slug' => 'satis/packages',               // URL slug
],
```

### Publish Config

```bash
php artisan vendor:publish --tag=filament-satis-config
```

## How Resources Read Config

Each resource overrides Filament static methods to read from config:

```php
public static function getNavigationIcon(): ?string
{
    return config('filament-satis.package_resource.navigation_icon', 'heroicon-o-cube');
}

public static function getNavigationSort(): ?int
{
    return config('filament-satis.package_resource.navigation_sort', 1);
}

public static function getNavigationGroup(): ?string
{
    return config('filament-satis.navigation_group', 'Satis');
}

public static function shouldRegisterNavigation(): bool
{
    return config('filament-satis.package_resource.should_register_navigation', true);
}

public static function getCluster(): ?string
{
    return config('filament-satis.package_resource.cluster');
}

public static function getSlug(): string
{
    return config('filament-satis.package_resource.slug', 'satis/packages');
}
```

## Translations

Namespace: `filament-satis::`

Available translation files: `general`, `package`, `token`, `dependency`, `package-release`, `package-download`

Languages: English (`en`), Brazilian Portuguese (`pt_BR`)

### Publish Translations

```bash
php artisan vendor:publish --tag=filament-satis-translations
```

### Translation Keys Pattern

```php
__('filament-satis::package.navigation_label')
__('filament-satis::package.model_label')
__('filament-satis::package.plural_model_label')
__('filament-satis::package.sections.general')
__('filament-satis::package.fields.name')
__('filament-satis::general.created_at')
```

## Artisan Commands (from laravel-satis)

| Command | Description |
|---------|-------------|
| `satis:build` | Build Satis repository (tenant-based) |
| `satis:token-build` | Build Satis repository (token-based) |
| `satis:validate` | Validate builds, trigger rebuilds if needed |
| `satis:clean` | Clean all Satis builds from storage |
| `satis:sanitize` | Remove credentials from Satis JSON files |
| `dependency:packages` | Process and sync package dependencies |

## Common Patterns

### Hide a Resource from Navigation

```php
// config/filament-satis.php
'package_download_resource' => [
    'should_register_navigation' => false,
    // ...
],
```

### Change Icons

```php
'package_resource' => [
    'navigation_icon' => 'heroicon-o-archive-box',
    // ...
],
```

### Group Resources in a Cluster

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

### Change Navigation Group

```php
'navigation_group' => 'Package Management',
```

### Custom URL Slugs

```php
'package_resource' => [
    'slug' => 'packages/composer',
    // ...
],
```

## Architecture

### Package Dependencies

```
filament-satis (Filament plugin)
  -> laravel-satis (Core Laravel package)
       -> Models, Enums, Actions, Jobs
       -> Controllers, Routes, Middleware
       -> Observers, Traits, Support
```

### Model Resolution

All resources use `ModelResolver` from `laravel-satis`:

```php
public static function getModel(): string
{
    return ModelResolver::package();
}
```

This allows users to override model classes via `config/satis.php`:

```php
'models' => [
    'package' => \App\Models\CustomPackage::class,
],
```

### Service Provider

`FilamentSatisServiceProvider` extends Spatie PackageServiceProvider:
- `hasConfigFile()` — Publishes `config/filament-satis.php`
- `hasTranslations()` — Registers `filament-satis::` translations

## Testing

The package uses Pest with Orchestra Testbench:

```bash
php vendor/bin/pest
```

Test structure:
- `tests/Feature/ConfigTest.php` — Config structure validation
- `tests/Unit/Plugin/` — Plugin and ServiceProvider tests
- `tests/Unit/Resources/` — Per-resource tests (model, config, pages, relations)
