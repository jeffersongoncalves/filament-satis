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
            ->columns(null)
            ->components([
                Section::make(__('filament-satis::token.sections.general'))
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-satis::token.fields.name')),

                        TextEntry::make('token')
                            ->label(__('filament-satis::token.infolist.token'))
                            ->copyable()
                            ->copyMessage(__('filament-satis::token.copy_message.token'))
                            ->copyMessageDuration(1500)
                            ->columnSpanFull(),

                        TextEntry::make('composer_command')
                            ->label(__('filament-satis::token.infolist.composer_command'))
                            ->copyable()
                            ->copyMessage(__('filament-satis::token.copy_message.composer_command'))
                            ->copyMessageDuration(1500)
                            ->columnSpanFull(),

                        TextEntry::make('composer_repository')
                            ->label(__('filament-satis::token.infolist.composer_repository'))
                            ->html()
                            ->copyable()
                            ->copyMessage(__('filament-satis::token.copy_message.composer_repository'))
                            ->copyMessageDuration(1500)
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
