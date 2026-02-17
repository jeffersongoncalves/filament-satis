<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageResource\RelationManagers;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ReleasesRelationManager extends RelationManager
{
    protected static string $relationship = 'packageReleases';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-satis::package-release.plural_model_label');
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(null)
            ->schema([
                Infolists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('version')
                            ->label(__('filament-satis::package-release.fields.version'))
                            ->badge(),
                        Infolists\Components\TextEntry::make('type')
                            ->label(__('filament-satis::package-release.fields.type')),
                        Infolists\Components\TextEntry::make('time')
                            ->label(__('filament-satis::package-release.fields.time')),
                        Infolists\Components\TextEntry::make('dependencies_count')
                            ->label(__('filament-satis::package-release.fields.dependencies_count'))
                            ->state(fn ($record) => $record->dependencies()->count()),
                        Infolists\Components\TextEntry::make('description')
                            ->label(__('filament-satis::package-release.fields.description'))
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('homepage')
                            ->label(__('filament-satis::package-release.fields.homepage'))
                            ->url(fn ($state) => $state)
                            ->openUrlInNewTab()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->badge()
                    ->sortable()
                    ->searchable(),

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
                    ->since()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
