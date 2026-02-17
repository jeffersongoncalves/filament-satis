# Changelog

All notable changes to this project will be documented in this file.

## 2.0.1 - 2026-02-17

### Fixed

- Corrected `vendor:publish` tag names for `laravel-satis` dependency (`satis-config` and `satis-migrations`)

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
