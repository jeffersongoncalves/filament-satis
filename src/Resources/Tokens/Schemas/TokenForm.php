<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Tokens\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class TokenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                TextInput::make('name')
                    ->label(__('filament-satis::token.fields.name'))
                    ->required()
                    ->maxLength(255),
                Select::make('packages')
                    ->label(__('filament-satis::token.fields.packages'))
                    ->relationship(
                        'packages',
                        'name',
                        fn (Builder $query) => $query->where('is_credentials_validated', true)->orderBy('name')
                    )
                    ->multiple()
                    ->preload()
                    ->searchable(),
            ]);
    }
}
