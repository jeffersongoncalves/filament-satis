<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Dependencies\RelationManagers;

use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class PackageReleasesRelationManager extends RelationManager
{
    protected static string $relationship = 'packageReleases';

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-satis::package-release.plural_model_label');
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                TextEntry::make('package.name')
                    ->label(__('filament-satis::package-release.fields.package')),

                TextEntry::make('version')
                    ->label(__('filament-satis::package-release.fields.version'))
                    ->badge(),

                TextEntry::make('pivot.version')
                    ->label(__('filament-satis::dependency.fields.constraint'))
                    ->badge(),
            ]);
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
                    ->badge()
                    ->sortable(),

                TextColumn::make('pivot.version')
                    ->label(__('filament-satis::dependency.fields.constraint'))
                    ->badge()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort(app(ModelResolver::packageRelease())->qualifyColumn('created_at'), 'desc')
            ->recordActions([
                ViewAction::make()
                    ->slideOver(),
            ]);
    }
}
