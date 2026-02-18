<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Dependencies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use JeffersonGoncalves\LaravelSatis\Enums\DependencyType;

class DependencyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-satis::dependency.fields.name')),

                        TextEntry::make('type')
                            ->label(__('filament-satis::dependency.fields.type'))
                            ->badge()
                            ->color(fn (DependencyType $state): string => match ($state) {
                                DependencyType::Private => 'danger',
                                default => 'success',
                            }),

                        TextEntry::make('versions')
                            ->label(__('filament-satis::dependency.fields.versions'))
                            ->badge()
                            ->separator(',')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
