<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PackageDownloadInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('package.name')
                            ->label(__('filament-satis::package-download.fields.package')),

                        TextEntry::make('version')
                            ->label(__('filament-satis::package-download.fields.version'))
                            ->badge(),

                        TextEntry::make('downloads')
                            ->label(__('filament-satis::package-download.fields.downloads'))
                            ->badge(),
                    ])->columns(2),
            ]);
    }
}
