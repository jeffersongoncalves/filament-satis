<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReleasesRelationManager extends RelationManager
{
    protected static string $relationship = 'releases';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-satis::package-release.plural_model_label');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('type')
                    ->label(__('filament-satis::package-release.fields.type'))
                    ->sortable(),

                TextColumn::make('time')
                    ->label(__('filament-satis::package-release.fields.time'))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
