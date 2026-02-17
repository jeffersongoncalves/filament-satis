<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use JeffersonGoncalves\LaravelSatis\Enums\PackageType;

class PackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-satis::package.fields.name'))
                    ->searchable()
                    ->sortable(),

                IconColumn::make('is_dev')
                    ->label(__('filament-satis::package.fields.is_dev'))
                    ->boolean()
                    ->sortable(),

                IconColumn::make('is_credentials_validated')
                    ->label(__('filament-satis::package.fields.is_credentials_validated'))
                    ->boolean()
                    ->sortable(),

                TextColumn::make('package_releases_count')
                    ->label(__('filament-satis::package-release.plural_model_label'))
                    ->counts('packageReleases')
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__('filament-satis::package.fields.type'))
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('url')
                    ->label(__('filament-satis::package.fields.url'))
                    ->limit(50)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label(__('filament-satis::general.updated_at'))
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options(PackageType::class),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
