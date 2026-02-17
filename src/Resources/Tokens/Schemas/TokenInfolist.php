<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Tokens\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TokenInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('filament-satis::token.sections.general'))
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-satis::token.fields.name')),

                        TextEntry::make('email')
                            ->label(__('filament-satis::token.fields.email')),

                        TextEntry::make('token')
                            ->label(__('filament-satis::token.fields.token'))
                            ->copyable()
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make(__('filament-satis::token.sections.packages'))
                    ->schema([
                        TextEntry::make('packages.name')
                            ->label(__('filament-satis::token.fields.packages'))
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
