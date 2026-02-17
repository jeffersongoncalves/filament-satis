<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PackageReleasesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('package.name')
                    ->label(__('filament-satis::package-release.fields.package'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->badge()
                    ->searchable()
                    ->sortable(),

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
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
