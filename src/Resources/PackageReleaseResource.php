<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\FilamentSatisPlugin;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleaseResource\Pages;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class PackageReleaseResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?int $navigationSort = 3;

    public static function getModel(): string
    {
        return ModelResolver::packageRelease();
    }

    public static function getNavigationGroup(): ?string
    {
        return FilamentSatisPlugin::get()->getNavigationGroup();
    }

    public static function getNavigationLabel(): string
    {
        return __('laravel-satis::package-release.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('laravel-satis::package-release.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('laravel-satis::package-release.plural_model_label');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('package.name')
                    ->label(__('laravel-satis::package-release.fields.package'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('version')
                    ->label(__('laravel-satis::package-release.fields.version'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label(__('laravel-satis::package-release.fields.type'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('time')
                    ->label(__('laravel-satis::package-release.fields.time'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-satis::general.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('package.name')
                            ->label(__('laravel-satis::package-release.fields.package')),
                        Infolists\Components\TextEntry::make('version')
                            ->label(__('laravel-satis::package-release.fields.version')),
                        Infolists\Components\TextEntry::make('type')
                            ->label(__('laravel-satis::package-release.fields.type')),
                        Infolists\Components\TextEntry::make('time')
                            ->label(__('laravel-satis::package-release.fields.time')),
                        Infolists\Components\TextEntry::make('description')
                            ->label(__('laravel-satis::package-release.fields.description'))
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('homepage')
                            ->label(__('laravel-satis::package-release.fields.homepage'))
                            ->url(fn ($state) => $state),
                    ])->columns(2),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackageReleases::route('/'),
            'view' => Pages\ViewPackageRelease::route('/{record}'),
        ];
    }
}
