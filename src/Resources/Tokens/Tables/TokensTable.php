<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Tokens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TokensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-satis::token.fields.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('packages_count')
                    ->label(__('filament-satis::token.fields.packages_count'))
                    ->counts('packages')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
