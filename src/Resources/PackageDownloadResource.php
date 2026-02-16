<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\FilamentSatisPlugin;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloadResource\Pages;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class PackageDownloadResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';

    protected static ?int $navigationSort = 4;

    public static function getModel(): string
    {
        return ModelResolver::packageDownload();
    }

    public static function getNavigationGroup(): ?string
    {
        return FilamentSatisPlugin::get()->getNavigationGroup();
    }

    public static function getNavigationLabel(): string
    {
        return __('laravel-satis::package-download.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('laravel-satis::package-download.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('laravel-satis::package-download.plural_model_label');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('package.name')
                    ->label(__('laravel-satis::package-download.fields.package'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('version')
                    ->label(__('laravel-satis::package-download.fields.version'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('downloads')
                    ->label(__('laravel-satis::package-download.fields.downloads'))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('laravel-satis::general.updated_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('downloads', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackageDownloads::route('/'),
        ];
    }
}
