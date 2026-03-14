<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Credentials\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CredentialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make(__('filament-satis::credential.sections.general'))
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-satis::credential.form.name'))
                            ->columnSpanFull(),
                        TextEntry::make('url')
                            ->label(__('filament-satis::credential.form.url'))
                            ->copyable()
                            ->columnSpanFull(),
                        TextEntry::make('email')
                            ->label(__('filament-satis::credential.form.email'))
                            ->columnSpanFull(),
                    ]),
                Section::make(__('filament-satis::credential.sections.validation'))
                    ->schema([
                        IconEntry::make('is_validated')
                            ->label(__('filament-satis::credential.table.is_validated'))
                            ->boolean()
                            ->columnSpanFull(),
                        TextEntry::make('validated_at')
                            ->label(__('filament-satis::credential.fields.validated_at'))
                            ->since()
                            ->columnSpanFull()
                            ->hidden(fn ($state) => blank($state)),
                    ]),
                Section::make(__('filament-satis::credential.sections.packages'))
                    ->schema([
                        TextEntry::make('packages_count')
                            ->label(__('filament-satis::credential.table.packages_count'))
                            ->state(fn ($record) => $record->packages()->count())
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
