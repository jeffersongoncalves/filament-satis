<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageReleases;

use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\Pages\ListPackageReleases;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\Pages\ViewPackageRelease;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\Schemas\PackageReleaseInfolist;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\Tables\PackageReleasesTable;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class PackageReleaseResource extends Resource
{
    public static function getModel(): string
    {
        return ModelResolver::packageRelease();
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-satis.package_release_resource.navigation_icon', 'heroicon-o-tag');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-satis.package_release_resource.navigation_sort', 3);
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-satis.navigation_group', 'Satis');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('filament-satis.package_release_resource.should_register_navigation', true);
    }

    public static function getCluster(): ?string
    {
        return config('filament-satis.package_release_resource.cluster');
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return config('filament-satis.package_release_resource.slug', 'satis/package-releases');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-satis::package-release.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-satis::package-release.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-satis::package-release.plural_model_label');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['version'];
    }

    public static function table(Table $table): Table
    {
        return PackageReleasesTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PackageReleaseInfolist::configure($schema);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPackageReleases::route('/'),
            'view' => ViewPackageRelease::route('/{record}'),
        ];
    }
}
