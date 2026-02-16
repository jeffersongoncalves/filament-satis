<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PackageReleaseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('package.name')
                            ->label(__('filament-satis::package-release.fields.package')),
                        TextEntry::make('version')
                            ->label(__('filament-satis::package-release.fields.version')),
                        TextEntry::make('type')
                            ->label(__('filament-satis::package-release.fields.type')),
                        TextEntry::make('time')
                            ->label(__('filament-satis::package-release.fields.time')),
                        TextEntry::make('description')
                            ->label(__('filament-satis::package-release.fields.description'))
                            ->columnSpanFull(),
                        TextEntry::make('homepage')
                            ->label(__('filament-satis::package-release.fields.homepage'))
                            ->url(fn ($state) => $state),
                    ])->columns(2),
            ]);
    }
}
