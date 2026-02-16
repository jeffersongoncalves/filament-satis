<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ReleasesRelationManager extends RelationManager
{
    protected static string $relationship = 'releases';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('laravel-satis::package-release.plural_model_label');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->label(__('laravel-satis::package-release.fields.version'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->label(__('laravel-satis::package-release.fields.type'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('time')
                    ->label(__('laravel-satis::package-release.fields.time'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-satis::general.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
