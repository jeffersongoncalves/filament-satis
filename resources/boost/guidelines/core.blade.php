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

| Resource | CRUD | Pages | Global Search |
|----------|------|-------|---------------|
| PackageResource | Full (List, Create, View, Edit, Delete) | List, Create, View, Edit | By `name` |
| TokenResource | Full (List, Create, View, Edit, Delete) | List, Create, View, Edit | By `name` |
| PackageReleaseResource | Read-only (List, View) | List, View | By `version` |
| PackageDownloadResource | Read-only (List, View) | List, View | — |
| DependencyResource | Read-only (List, View) | List, View | By `name` |

**RelationManagers:**
- PackageResource: `ReleasesRelationManager` (with infolist slideOver), `DownloadsRelationManager` (with infolist slideOver)
- DependencyResource: `PackageReleasesRelationManager` (with infolist slideOver)

**Key Features per Resource:**
- PackageResource: `is_dev` toggle, ToggleButtons for type, dynamic name validation, `ValidateCredentials` action, Infolist with webhook info (GitHub), job dispatching on create/edit
- TokenResource: Infolist with copyable token, packages list, job dispatching on create/edit
- PackageReleaseResource: Dependencies repeatable in infolist, `dependencies_count` in table
- PackageDownloadResource: Badges for version/downloads in table and infolist
- DependencyResource: Badges for type/versions, `package_releases_count` in table

### Configuration

Config file: `config/filament-satis.php` — per-resource customization:

- `navigation_group` — Shared navigation group (default: `'Satis'`)
- `{resource}_resource.cluster` — Filament cluster (default: `null`)
- `{resource}_resource.should_register_navigation` — Show in navigation (default: `true`)
- `{resource}_resource.navigation_icon` — Heroicon name
- `{resource}_resource.navigation_sort` — Sort order
- `{resource}_resource.slug` — URL slug

### Artisan Commands (from laravel-satis)

| Command | Description |
|---------|-------------|
| `satis:build` | Build Satis repository (tenant-based) |
| `satis:token-build` | Build Satis repository (token-based) |
| `satis:validate` | Validate builds, trigger rebuilds if needed |
| `satis:clean` | Clean all Satis builds from storage |
| `satis:sanitize` | Remove credentials from Satis JSON files |
| `dependency:packages` | Process and sync package dependencies |

### Translations

Uses `filament-satis::` namespace with English and Brazilian Portuguese translations. Publish with:

```bash
php artisan vendor:publish --tag=filament-satis-translations
```

### Conventions

- All models are resolved via `ModelResolver` from `laravel-satis` — never hardcode model classes.
- Resources read all navigation/UI properties from config — override via `config/filament-satis.php`.
- The plugin passes tenancy config to `satis` during `register()` and sets the resolver during `boot()`.
- View pages use `hasCombinedRelationManagerTabsWithContent()` for PackageResource and DependencyResource.
- Create/Edit pages dispatch sync jobs (`SyncTenantPackages`, `SyncTokenPackages`) after save operations.
- Infolists use copyable TextEntries for sensitive data (tokens, webhook secrets).
- Table columns use badges for version/type fields and icons for boolean fields.
