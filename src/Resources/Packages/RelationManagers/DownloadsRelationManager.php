<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\RelationManagers;

use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DownloadsRelationManager extends RelationManager
{
    protected static string $relationship = 'packageDownloads';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-satis::package-download.plural_model_label');
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                TextEntry::make('version')
                    ->label(__('filament-satis::package-download.fields.version'))
                    ->badge(),

                TextEntry::make('downloads')
                    ->label(__('filament-satis::package-download.fields.downloads'))
                    ->badge(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('version')
                    ->label(__('filament-satis::package-download.fields.version'))
                    ->badge()
                    ->sortable()
                    ->searchable(),

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
            ->defaultSort('downloads', 'desc')
            ->recordActions([
                ViewAction::make()
                    ->slideOver(),
            ]);
    }
}
