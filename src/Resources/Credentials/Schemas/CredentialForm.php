<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Credentials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CredentialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                TextInput::make('name')
                    ->label(__('filament-satis::credential.form.name'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('url')
                    ->label(__('filament-satis::credential.form.url'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label(__('filament-satis::credential.form.email'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('password')
                    ->label(__('filament-satis::credential.form.password'))
                    ->password()
                    ->revealable()
                    ->required(fn (string $context): bool => $context === 'create')
                    ->dehydrated(fn ($state) => filled($state)),
            ]);
    }
}
