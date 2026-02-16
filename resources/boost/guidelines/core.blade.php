## Filament Satis

A Filament plugin for managing private Composer repositories powered by Satis. Requires `jeffersongoncalves/laravel-satis` as core dependency.

### Plugin Registration

Register the plugin in your Filament panel provider:

@verbatim
<code-snippet name="Register FilamentSatisPlugin" lang="php">
use JeffersonGoncalves\FilamentSatis\FilamentSatisPlugin;

$panel->plugin(
    FilamentSatisPlugin::make()
);
</code-snippet>
@endverbatim

With multi-tenancy:

@verbatim
<code-snippet name="Register with tenancy" lang="php">
$panel->plugin(
    FilamentSatisPlugin::make()
        ->tenancy(
            enabled: true,
            model: \App\Models\Team::class,
            foreignKey: 'team_id'
        )
);
</code-snippet>
@endverbatim

### Resources

5 Filament Resources are registered automatically:

| Resource | CRUD | Model (via ModelResolver) |
|----------|------|--------------------------|
| PackageResource | Full (List, Create, View, Edit, Delete) | Package |
| TokenResource | Full (List, Create, View, Edit, Delete) | Token |
| PackageReleaseResource | Read-only (List, View) | PackageRelease |
| PackageDownloadResource | Read-only (List) | PackageDownload |
| DependencyResource | Read-only (List, View) | Dependency |

RelationManagers: PackageResource has `ReleasesRelationManager` and `DownloadsRelationManager`. DependencyResource has `PackageReleasesRelationManager`.

### Configuration

Config file: `config/filament-satis.php` — per-resource customization:

- `navigation_group` — Shared navigation group (default: `'Satis'`)
- `{resource}_resource.cluster` — Filament cluster (default: `null`)
- `{resource}_resource.should_register_navigation` — Show in navigation (default: `true`)
- `{resource}_resource.navigation_icon` — Heroicon name
- `{resource}_resource.navigation_sort` — Sort order
- `{resource}_resource.slug` — URL slug

### Translations

Uses `filament-satis::` namespace with English and Brazilian Portuguese translations. Publish with:

```bash
php artisan vendor:publish --tag=filament-satis-translations
```

### Conventions

- All models are resolved via `ModelResolver` from `laravel-satis` — never hardcode model classes.
- Resources read all navigation/UI properties from config — override via `config/filament-satis.php`.
- The plugin passes tenancy config to `laravel-satis` during `register()` and sets the resolver during `boot()`.
