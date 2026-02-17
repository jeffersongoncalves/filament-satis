<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages;

use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\Pages\CreatePackage;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\Pages\EditPackage;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\Pages\ListPackages;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\Pages\ViewPackage;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\RelationManagers\DownloadsRelationManager;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\RelationManagers\ReleasesRelationManager;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\Schemas\PackageForm;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\Schemas\PackageInfolist;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\Tables\PackagesTable;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class PackageResource extends Resource
{
    public static function getModel(): string
    {
        return ModelResolver::package();
    }

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

    public static function getSlug(?Panel $panel = null): string
    {
        return config('filament-satis.package_resource.slug', 'satis/packages');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-satis::package.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-satis::package.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-satis::package.plural_model_label');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function form(Schema $schema): Schema
    {
        return PackageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PackageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PackagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ReleasesRelationManager::class,
            DownloadsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPackages::route('/'),
            'create' => CreatePackage::route('/create'),
            'view' => ViewPackage::route('/{record}'),
            'edit' => EditPackage::route('/{record}/edit'),
        ];
    }
}
