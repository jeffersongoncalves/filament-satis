<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\RelationManagers;

use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReleasesRelationManager extends RelationManager
{
    protected static string $relationship = 'releases';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-satis::package-release.plural_model_label');
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->badge(),

                TextEntry::make('type')
                    ->label(__('filament-satis::package-release.fields.type')),

                TextEntry::make('time')
                    ->label(__('filament-satis::package-release.fields.time')),

                TextEntry::make('dependencies_count')
                    ->label(__('filament-satis::dependency.plural_model_label'))
                    ->counts('dependencies'),

                TextEntry::make('description')
                    ->label(__('filament-satis::package-release.fields.description'))
                    ->columnSpanFull()
                    ->placeholder('—'),

                TextEntry::make('homepage')
                    ->label(__('filament-satis::package-release.fields.homepage'))
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab()
                    ->columnSpanFull()
                    ->placeholder('—'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->badge()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('dependencies_count')
                    ->label(__('filament-satis::dependency.plural_model_label'))
                    ->counts('dependencies')
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__('filament-satis::package-release.fields.type'))
                    ->sortable(),

                TextColumn::make('time')
                    ->label(__('filament-satis::package-release.fields.time'))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make()
                    ->slideOver(),
            ]);
    }
}
