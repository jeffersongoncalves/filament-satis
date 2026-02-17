<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Tokens\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TokenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('filament-satis::token.sections.general'))
                    ->schema([
                        TextInput::make('name')
                            ->label(__('filament-satis::token.fields.name'))
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label(__('filament-satis::token.fields.email'))
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('token')
                            ->label(__('filament-satis::token.fields.token'))
                            ->disabled()
                            ->dehydrated(false)
                            ->visibleOn('edit')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make(__('filament-satis::token.sections.packages'))
                    ->schema([
                        Select::make('packages')
                            ->label(__('filament-satis::token.fields.packages'))
                            ->relationship(
                                'packages',
                                'name',
                                fn ($query) => $query->where('is_credentials_validated', true)->orderBy('name')
                            )
                            ->multiple()
                            ->preload()
                            ->searchable(),
                    ]),
            ]);
    }
}
