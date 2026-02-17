<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\Tables;

use Filament\Actions\ViewAction;
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
                    ->badge()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('downloads')
                    ->label(__('filament-satis::package-download.fields.downloads'))
                    ->badge()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->defaultSort('downloads', 'desc');
    }
}
