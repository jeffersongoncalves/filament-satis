<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageResource\RelationManagers;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class DownloadsRelationManager extends RelationManager
{
    protected static string $relationship = 'packageDownloads';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-satis::package-download.plural_model_label');
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(null)
            ->schema([
                Infolists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('version')
                            ->label(__('filament-satis::package-download.fields.version'))
                            ->badge(),
                        Infolists\Components\TextEntry::make('downloads')
                            ->label(__('filament-satis::package-download.fields.downloads'))
                            ->badge(),
                    ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->label(__('filament-satis::package-download.fields.version'))
                    ->badge()
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('downloads')
                    ->label(__('filament-satis::package-download.fields.downloads'))
                    ->badge()
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
            ])
            ->defaultSort('downloads', 'desc');
    }
}
