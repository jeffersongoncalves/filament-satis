<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PackageDownloadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('package.name')
                    ->label(__('filament-satis::package-download.fields.package'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('version')
                    ->label(__('filament-satis::package-download.fields.version'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('downloads')
                    ->label(__('filament-satis::package-download.fields.downloads'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label(__('filament-satis::general.updated_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('downloads', 'desc');
    }
}
