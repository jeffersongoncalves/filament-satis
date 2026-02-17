<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleaseResource\Pages;
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

    public static function getSlug(): string
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
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('package.name')
                    ->label(__('filament-satis::package-release.fields.package'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label(__('filament-satis::package-release.fields.type'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('dependencies_count')
                    ->label(__('filament-satis::package-release.fields.dependencies_count'))
                    ->counts('dependencies')
                    ->sortable(),

                Tables\Columns\TextColumn::make('time')
                    ->label(__('filament-satis::package-release.fields.time'))
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
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(null)
            ->schema([
                Infolists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('package.name')
                            ->label(__('filament-satis::package-release.fields.package')),
                        Infolists\Components\TextEntry::make('version')
                            ->label(__('filament-satis::package-release.fields.version'))
                            ->badge(),
                        Infolists\Components\TextEntry::make('type')
                            ->label(__('filament-satis::package-release.fields.type')),
                        Infolists\Components\TextEntry::make('time')
                            ->label(__('filament-satis::package-release.fields.time')),
                        Infolists\Components\TextEntry::make('description')
                            ->label(__('filament-satis::package-release.fields.description'))
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('homepage')
                            ->label(__('filament-satis::package-release.fields.homepage'))
                            ->url(fn ($state) => $state)
                            ->openUrlInNewTab(),
                    ])->columns(2),

                Infolists\Components\Section::make(__('filament-satis::package-release.sections.dependencies'))
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('dependencies')
                            ->schema([
                                Infolists\Components\TextEntry::make('name')
                                    ->label(__('filament-satis::dependency.fields.name')),
                                Infolists\Components\TextEntry::make('pivot.version')
                                    ->label(__('filament-satis::dependency.fields.constraint'))
                                    ->badge(),
                            ])->columns(2),
                    ])->collapsible(),
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
