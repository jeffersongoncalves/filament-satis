<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PackageReleaseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('package.name')
                            ->label(__('filament-satis::package-release.fields.package')),

                        TextEntry::make('version')
                            ->label(__('filament-satis::package-release.fields.version'))
                            ->badge(),

                        TextEntry::make('type')
                            ->label(__('filament-satis::package-release.fields.type')),

                        TextEntry::make('time')
                            ->label(__('filament-satis::package-release.fields.time'))
                            ->since(),

                        TextEntry::make('description')
                            ->label(__('filament-satis::package-release.fields.description'))
                            ->columnSpanFull()
                            ->placeholder('—'),

                        TextEntry::make('homepage')
                            ->label(__('filament-satis::package-release.fields.homepage'))
                            ->url(fn ($state) => $state)
                            ->openUrlInNewTab()
                            ->columnSpanFull()
                            ->placeholder('—'),
                    ])->columns(2),

                Section::make(__('filament-satis::dependency.plural_model_label'))
                    ->schema([
                        RepeatableEntry::make('dependencies')
                            ->schema([
                                TextEntry::make('name')
                                    ->label(__('filament-satis::dependency.fields.name')),

                                TextEntry::make('pivot.version')
                                    ->label(__('filament-satis::package-release.fields.version'))
                                    ->badge(),
                            ])
                            ->columns(2)
                            ->placeholder('—'),
                    ])
                    ->collapsible(),
            ]);
    }
}
