<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloadResource\Pages;
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
        return config('filament-satis.package_download_resource.navigation_sort', 4);
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

    public static function getSlug(): string
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
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('package.name')
                    ->label(__('filament-satis::package-download.fields.package'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('version')
                    ->label(__('filament-satis::package-download.fields.version'))
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('downloads')
                    ->label(__('filament-satis::package-download.fields.downloads'))
                    ->badge()
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('downloads', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(null)
            ->schema([
                Infolists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('package.name')
                            ->label(__('filament-satis::package-download.fields.package')),
                        Infolists\Components\TextEntry::make('version')
                            ->label(__('filament-satis::package-download.fields.version'))
                            ->badge(),
                        Infolists\Components\TextEntry::make('downloads')
                            ->label(__('filament-satis::package-download.fields.downloads'))
                            ->badge(),
                    ])->columns(2),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackageDownloads::route('/'),
            'view' => Pages\ViewPackageDownload::route('/{record}'),
        ];
    }
}
