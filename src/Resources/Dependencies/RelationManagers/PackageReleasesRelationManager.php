<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Dependencies\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PackageReleasesRelationManager extends RelationManager
{
    protected static string $relationship = 'packageReleases';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-satis::package-release.plural_model_label');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('package.name')
                    ->label(__('filament-satis::package-release.fields.package'))
                    ->sortable(),

                TextColumn::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->sortable(),

                TextColumn::make('pivot.version')
                    ->label(__('filament-satis::dependency.fields.constraint'))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
