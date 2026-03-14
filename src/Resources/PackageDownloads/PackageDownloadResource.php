<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads;

use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\Pages\ListPackageDownloads;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\Pages\ViewPackageDownload;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\Schemas\PackageDownloadInfolist;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\Tables\PackageDownloadsTable;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class PackageDownloadResource extends Resource
{
    public static function getModel(): string
    {
        return ModelResolver::packageDownload();
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-satis.package_download_resource.navigation_icon', 'heroicon-o-arrow-down-tray');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-satis.package_download_resource.navigation_sort', 5);
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-satis.navigation_group', 'Satis');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('filament-satis.package_download_resource.should_register_navigation', true);
    }

    public static function getCluster(): ?string
    {
        return config('filament-satis.package_download_resource.cluster');
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return config('filament-satis.package_download_resource.slug', 'satis/package-downloads');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-satis::package-download.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-satis::package-download.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-satis::package-download.plural_model_label');
    }

    public static function table(Table $table): Table
    {
        return PackageDownloadsTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PackageDownloadInfolist::configure($schema);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPackageDownloads::route('/'),
            'view' => ViewPackageDownload::route('/{record}'),
        ];
    }
}
