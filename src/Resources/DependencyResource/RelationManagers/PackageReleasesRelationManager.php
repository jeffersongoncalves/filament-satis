<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\DependencyResource\RelationManagers;

use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class PackageReleasesRelationManager extends RelationManager
{
    protected static string $relationship = 'packageReleases';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-satis::package-release.plural_model_label');
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(null)
            ->schema([
                Infolists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('package.name')
                            ->label(__('filament-satis::package-release.fields.package')),
                        Infolists\Components\TextEntry::make('version')
                            ->label(__('filament-satis::package-release.fields.version'))
                            ->badge(),
                        Infolists\Components\TextEntry::make('pivot.version')
                            ->label(__('filament-satis::dependency.fields.constraint'))
                            ->badge(),
                    ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('package.name')
                    ->label(__('filament-satis::package-release.fields.package'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('pivot.version')
                    ->label(__('filament-satis::dependency.fields.constraint'))
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->since()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
            ])
            ->defaultSort(app(ModelResolver::packageRelease())->qualifyColumn('created_at'), 'desc');
    }
}
