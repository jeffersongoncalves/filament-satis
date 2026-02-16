<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Dependencies;

use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\Dependencies\Pages\ListDependencies;
use JeffersonGoncalves\FilamentSatis\Resources\Dependencies\Pages\ViewDependency;
use JeffersonGoncalves\FilamentSatis\Resources\Dependencies\RelationManagers\PackageReleasesRelationManager;
use JeffersonGoncalves\FilamentSatis\Resources\Dependencies\Schemas\DependencyInfolist;
use JeffersonGoncalves\FilamentSatis\Resources\Dependencies\Tables\DependenciesTable;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class DependencyResource extends Resource
{
    public static function getModel(): string
    {
        return ModelResolver::dependency();
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-satis.dependency_resource.navigation_icon', 'heroicon-o-link');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-satis.dependency_resource.navigation_sort', 5);
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-satis.navigation_group', 'Satis');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('filament-satis.dependency_resource.should_register_navigation', true);
    }

    public static function getCluster(): ?string
    {
        return config('filament-satis.dependency_resource.cluster');
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return config('filament-satis.dependency_resource.slug', 'satis/dependencies');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-satis::dependency.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-satis::dependency.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-satis::dependency.plural_model_label');
    }

    public static function table(Table $table): Table
    {
        return DependenciesTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DependencyInfolist::configure($schema);
    }

    public static function getRelations(): array
    {
        return [
            PackageReleasesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDependencies::route('/'),
            'view' => ViewDependency::route('/{record}'),
        ];
    }
}
