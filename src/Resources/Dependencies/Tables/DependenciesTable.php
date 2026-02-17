<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Dependencies\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use JeffersonGoncalves\LaravelSatis\Enums\DependencyType;

class DependenciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-satis::dependency.fields.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__('filament-satis::dependency.fields.type'))
                    ->badge()
                    ->sortable(),

                TextColumn::make('versions')
                    ->label(__('filament-satis::dependency.fields.versions'))
                    ->badge()
                    ->separator(','),

                TextColumn::make('package_releases_count')
                    ->label(__('filament-satis::dependency.fields.releases_count'))
                    ->counts('packageReleases')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options(DependencyType::class),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->defaultSort('name');
    }
}
