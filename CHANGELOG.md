# Changelog

All notable changes to this project will be documented in this file.

## 3.11.1 - 2026-02-18

### Fixed

- Fix expandable version list not showing items when expanded

## 3.11.0 - 2026-02-18

### Fixed

- Correct pt_BR translations (missing accents: Dependências, Versões, Restrição, Versão, Descrição, Informações)
- Limit versions badges to 3 in dependencies table with expandable list

## 3.10.1 - 2026-02-18

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/3.10.0...3.10.1

## 3.10.0 - 2026-02-18

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/3.9.0...3.10.0

## 3.9.0 - 2026-02-18

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/3.8.0...3.9.0

## 3.8.0 - 2026-02-18

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/3.7.0...3.8.0

## 3.7.0 - 2026-02-18

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/3.6.0...3.7.0

## 2.6.0 - 2026-02-17

### Feature

- Add `validateCredentials` action to View page and Table (record action)
- Hide validate button when credentials are already validated

## 3.6.0 - 2026-02-17

### Feature

- Add `validateCredentials` action to View page and Table (record action)
- Hide validate button when credentials are already validated

## 2.5.0 - 2026-02-17

### Feature

- Add `since()` (diffForHumans) to `time` columns and entries (package releases)
- Require `laravel-satis ^1.11` (datetime cast on `PackageRelease::time`)

## 3.5.0 - 2026-02-17

### Feature

- Add `since()` (diffForHumans) to `time` columns and entries (package releases)
- Require `laravel-satis ^1.11` (datetime cast on `PackageRelease::time`)

## 1.4.0 - 2026-02-17

### Feature

- Replace `dateTime()` with `since()` (diffForHumans) on all datetime columns and entries

## 3.4.0 - 2026-02-17

### Feature

- Replace `dateTime()` with `since()` (diffForHumans) on all datetime columns and entries

## 3.3.3 - 2026-02-17

### Fix

- Update relationship names to match laravel-satis rename (`releases` → `packageReleases`, `downloads` → `packageDownloads`)

## 2.3.3 - 2026-02-17

### Fix

- Update relationship names to match laravel-satis rename (`releases` → `packageReleases`, `downloads` → `packageDownloads`)

## 3.3.2 - 2026-02-17

### Changed

- Use `PackageType::of()` in match expressions for cleaner label resolution per package type

## 3.3.1 - 2026-02-17

### Fixed

- Fix TypeError: use enum_equals in match expressions instead of PackageType::tryFrom() which fails when $get('type') returns a BackedEnum instance

## 3.3.0 - 2026-02-17

### Added

- `enum_equals()` namespaced helper function for clean BackedEnum comparisons

### Changed

- Restructured Package form: flat layout with dynamic labels per type (Composer/GitHub), instruction text entries, fieldset for credentials, and specific validations for GitHub URL and PAT token

## 3.2.1 - 2026-02-17

### Fixed

- Remove email field from token UI — the email is a fixed internal value used only for Laravel authentication and does not need to be displayed

## 3.2.0 - 2026-02-17

### What's Changed

#### Enhancements

- Enhanced **PackageInfolist** with new fields and sections:
  
  - `composer_command` field with copyable support
  - `webhook_url` field with copyable support
  - Package release section via Grid relationship (version, time, type, description, homepage)
  - Dependencies section with RepeatableEntry
  - All entries set to `columnSpanFull` layout
  
- Enhanced **TokenInfolist** with copyable token, composer command, and composer repository fields
  
- Added new translation keys for `infolist` and `copy_message` in **en** and **pt_BR**
  

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/3.1.0...3.2.0

## 3.1.0 - 2026-02-17

### What's Changed

#### New Features

- Add **Infolists** to all Resources (Package, Token, PackageRelease, PackageDownload, Dependency)
- Add **Global Search** support to PackageResource, TokenResource, PackageReleaseResource, DependencyResource
- Add **is_dev** toggle field to PackageResource form and table
- Add **ToggleButtons** for package type with dynamic name validation (Composer vs GitHub)
- Add **ValidateCredentials** action on EditPackage page
- Add **SyncTenantPackages** job dispatch on package create/edit
- Add **SyncTokenPackages** job dispatch on token create/edit
- Add **ViewPackageDownload** page
- Add **slideOver ViewAction** to all RelationManagers (Releases, Downloads, PackageReleases)
- Add **badges** to version, downloads, and type columns across tables
- Add **dependencies count** column to PackageReleasesTable and ReleasesRelationManager
- Add **versions badges** to DependenciesTable and DependencyInfolist
- Add **combined relation manager tabs** on ViewPackage and ViewDependency pages
- Add filtered packages select on TokenForm (only validated packages, ordered by name)
- Add **pt_BR** and **en** translations for new fields, actions, and notifications
- Bump laravel-satis requirement to `^1.7`

#### Documentation

- Update README with Version Compatibility table, new features, and commands
- Update SKILL.md with complete resource documentation
- Update core.blade.php guidelines

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/3.0.2...3.1.0

## 3.0.2 - 2026-02-17

### Changed

- Updated all config references from `config/laravel-satis.php` to `config/satis.php` to match `laravel-satis` v1.3.5
- Updated `FilamentSatisPlugin` to use `satis.*` config keys instead of `laravel-satis.*`

## 3.0.1 - 2026-02-17

### Fixed

- Corrected `vendor:publish` tag names for `laravel-satis` dependency (`satis-config` and `satis-migrations`)

## 3.0.0 - Unreleased

### Upgrading from 2.x

This release upgrades the plugin to **Filament v5** with **Livewire v4** support. The Filament API remains unchanged — no breaking changes in resource structure, schemas, or tables.

If you are using Filament v4, continue using the `2.x` branch.

#### Requirements

- PHP 8.2+
- Laravel 12+
- Filament 5.0+

### Changed

- Upgraded to Filament v5 (Livewire v4 support)
- Updated `orchestra/testbench` requirement to `^10.0|^11.0` (10.x for Laravel 12)
- Updated `pestphp/pest` requirement to `^4.0`
- Updated `pestphp/pest-plugin-laravel` requirement to `^4.0`
- Updated `pestphp/pest-plugin-livewire` requirement to `^4.0`
- Updated CI workflows for branch `3.x` and Filament `5.*`

## 2.0.0 - Unreleased

### Upgrading from 1.x

This release upgrades the plugin to **Filament v4**. If you are using Filament v3, continue using the `1.x` branch.

#### Requirements

- PHP 8.2+
- Laravel 11+
- Filament 4.0+

#### Breaking Changes

- **Filament v4 required** — This version is not compatible with Filament v3
- **New directory structure** — Resources use the Filament v4 pluralized directory layout with dedicated `Schemas/` and `Tables/` classes
- **Method signatures changed** — `Form $form` replaced by `Schema $schema`, `Infolist $infolist` replaced by `Schema $schema`
- **Table API changes** — `->actions()` renamed to `->recordActions()`, `->bulkActions()` renamed to `->toolbarActions()`
- **Namespace changes** — All resource classes moved to pluralized namespaces (e.g., `Resources\Packages\PackageResource` instead of `Resources\PackageResource`)

#### Namespace Migration Guide

| v1.x (Filament v3) | v2.x (Filament v4) |
|---------------------|---------------------|
| `Resources\PackageResource` | `Resources\Packages\PackageResource` |
| `Resources\TokenResource` | `Resources\Tokens\TokenResource` |
| `Resources\PackageReleaseResource` | `Resources\PackageReleases\PackageReleaseResource` |
| `Resources\PackageDownloadResource` | `Resources\PackageDownloads\PackageDownloadResource` |
| `Resources\DependencyResource` | `Resources\Dependencies\DependencyResource` |

### Added

- Dedicated `Schemas/` classes for form and infolist definitions (`PackageForm`, `TokenForm`, `DependencyInfolist`, `PackageReleaseInfolist`)
- Dedicated `Tables/` classes for table definitions (`PackagesTable`, `TokensTable`, `DependenciesTable`, `PackageReleasesTable`, `PackageDownloadsTable`)

### Changed

- Upgraded to Filament v4 API (`Schema`, `recordActions`, `toolbarActions`)
- Migrated to Filament v4 pluralized directory structure
- Updated `orchestra/testbench` requirement to `^9.0|^10.0` (9.x for Laravel 11, 10.x for Laravel 12)
- Updated CI workflows for branch `2.x` and Filament `4.*`

## 1.0.0 - Initial Release

### Added

- Package management with CRUD operations for Composer & GitHub sources
- Token-based authentication with per-token package scoping
- Package release version tracking synced from Satis builds
- Per-version download statistics and analytics
- Public/private dependency classification from package releases
- Multi-tenancy with tenant-isolated data and configurable foreign keys
- Credential validation with tracked validation timestamps
- GitHub webhooks with HMAC-SHA256 signature validation
- Per-resource configuration for navigation, icons, slugs, clusters, and visibility
- English and Brazilian Portuguese translations
- Laravel Boost AI guidelines and skills
