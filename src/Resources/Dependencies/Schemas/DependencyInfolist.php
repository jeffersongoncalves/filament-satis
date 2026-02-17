<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Dependencies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DependencyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-satis::dependency.fields.name')),

                        TextEntry::make('type')
                            ->label(__('filament-satis::dependency.fields.type'))
                            ->badge(),

                        TextEntry::make('versions')
                            ->label(__('filament-satis::dependency.fields.versions'))
                            ->badge()
                            ->separator(',')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
