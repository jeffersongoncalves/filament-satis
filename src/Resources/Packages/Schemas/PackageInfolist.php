<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use JeffersonGoncalves\LaravelSatis\Enums\PackageType;

class PackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('filament-satis::package.sections.general'))
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-satis::package.fields.name')),

                        TextEntry::make('type')
                            ->label(__('filament-satis::package.fields.type'))
                            ->badge(),

                        TextEntry::make('url')
                            ->label(__('filament-satis::package.fields.url'))
                            ->url(fn ($state) => $state)
                            ->openUrlInNewTab(),

                        IconEntry::make('is_dev')
                            ->label(__('filament-satis::package.fields.is_dev'))
                            ->boolean(),
                    ])->columns(2),

                Section::make(__('filament-satis::package.sections.credentials'))
                    ->schema([
                        IconEntry::make('is_credentials_validated')
                            ->label(__('filament-satis::package.fields.is_credentials_validated'))
                            ->boolean(),

                        TextEntry::make('credentials_validated_at')
                            ->label(__('filament-satis::package.fields.credentials_validated_at'))
                            ->dateTime()
                            ->placeholder('—'),
                    ])->columns(2),

                Section::make(__('filament-satis::package.sections.webhook'))
                    ->schema([
                        TextEntry::make('webhook_secret')
                            ->label(__('filament-satis::package.fields.webhook_secret'))
                            ->copyable()
                            ->placeholder('—'),

                        TextEntry::make('reference')
                            ->label(__('filament-satis::package.fields.reference'))
                            ->copyable()
                            ->placeholder('—'),
                    ])->columns(2)
                    ->visible(fn ($record) => $record?->type === PackageType::Github),
            ]);
    }
}
