<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class DownloadsRelationManager extends RelationManager
{
    protected static string $relationship = 'downloads';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('laravel-satis::package-download.plural_model_label');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->label(__('laravel-satis::package-download.fields.version'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('downloads')
                    ->label(__('laravel-satis::package-download.fields.downloads'))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-satis::general.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('downloads', 'desc');
    }
}
