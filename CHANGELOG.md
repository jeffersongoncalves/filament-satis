# Changelog

All notable changes to this project will be documented in this file.

## 1.3.2 - 2026-02-17

### Changed

- Use `PackageType::of()` in match expressions for cleaner label resolution per package type

## 1.3.1 - 2026-02-17

### Fixed

- Fix TypeError: use enum_equals in match expressions instead of PackageType::tryFrom() which fails when $get('type') returns a BackedEnum instance

## 1.3.0 - 2026-02-17

### Added

- `enum_equals()` namespaced helper function for clean BackedEnum comparisons

### Changed

- Restructured Package form: flat layout with dynamic labels per type (Composer/GitHub), instruction placeholders, fieldset for credentials, and specific validations for GitHub URL and PAT token

## 1.2.1 - 2026-02-17

### Fixed

- Remove email field from token UI — the email is a fixed internal value used only for Laravel authentication and does not need to be displayed

## 1.2.0 - 2026-02-17

### What's Changed

#### Enhancements

- Enhanced **PackageInfolist** with new fields and sections:
  
  - `composer_command` field with copyable support
  - `webhook_url` field with copyable support
  - Package release section via Grid relationship (version, time, type, description, homepage)
  - Dependencies section with RepeatableEntry
  - All entries set to `columnSpanFull` layout
  
- Added new translation keys for `infolist` and `copy_message` in **en** and **pt_BR**
  

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/1.1.0...1.2.0

## 1.1.0 - 2026-02-17

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

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/compare/1.0.2...1.1.0

## 1.0.2 - 2026-02-17

### Changed

- Updated all config references from `config/laravel-satis.php` to `config/satis.php` to match `laravel-satis` v1.3.5
- Updated `FilamentSatisPlugin` to use `satis.*` config keys instead of `laravel-satis.*`

## 1.0.1 - 2026-02-17

### Fixed

- Corrected `vendor:publish` tag names for `laravel-satis` dependency (`satis-config` and `satis-migrations`)

## 1.0.0 - 2026-02-16

**Full Changelog**: https://github.com/jeffersongoncalves/filament-satis/commits/1.0.0
