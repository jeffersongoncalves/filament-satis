<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Enums\DependencyType;
use JeffersonGoncalves\FilamentSatis\FilamentSatisPlugin;
use JeffersonGoncalves\FilamentSatis\Resources\DependencyResource\Pages;
use JeffersonGoncalves\FilamentSatis\Resources\DependencyResource\RelationManagers;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class DependencyResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?int $navigationSort = 5;

    public static function getModel(): string
    {
        return ModelResolver::dependency();
    }

    public static function getNavigationGroup(): ?string
    {
        return FilamentSatisPlugin::get()->getNavigationGroup();
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
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-satis::dependency.fields.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label(__('filament-satis::dependency.fields.type'))
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('package_releases_count')
                    ->label(__('filament-satis::dependency.fields.releases_count'))
                    ->counts('packageReleases')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options(DependencyType::class),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('name');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label(__('filament-satis::dependency.fields.name')),
                        Infolists\Components\TextEntry::make('type')
                            ->label(__('filament-satis::dependency.fields.type'))
                            ->badge(),
                        Infolists\Components\TextEntry::make('versions')
                            ->label(__('filament-satis::dependency.fields.versions'))
                            ->listWithLineBreaks()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PackageReleasesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDependencies::route('/'),
            'view' => Pages\ViewDependency::route('/{record}'),
        ];
    }
}
