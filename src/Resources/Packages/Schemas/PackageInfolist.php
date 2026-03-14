<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use JeffersonGoncalves\LaravelSatis\Enums\PackageType;

class PackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-satis::package.fields.name'))
                            ->columnSpanFull(),
                        TextEntry::make('type')
                            ->label(__('filament-satis::package.fields.type'))
                            ->columnSpanFull(),
                        TextEntry::make('credential.name')
                            ->label(__('filament-satis::package.infolist.credential'))
                            ->columnSpanFull(),
                        TextEntry::make('credential.url')
                            ->label(__('filament-satis::package.infolist.credential_url'))
                            ->columnSpanFull(),
                        IconEntry::make('is_dev')
                            ->label(__('filament-satis::package.fields.is_dev'))
                            ->boolean()
                            ->columnSpanFull(),
                        TextEntry::make('composer_command')
                            ->label(__('filament-satis::package.infolist.composer_command'))
                            ->copyable()
                            ->copyMessage(__('filament-satis::package.copy_message.composer_command'))
                            ->copyMessageDuration(1500)
                            ->columnSpanFull(),
                    ]),
                Section::make(__('filament-satis::package.sections.credentials'))
                    ->schema([
                        IconEntry::make('is_credentials_validated')
                            ->label(__('filament-satis::package.fields.is_credentials_validated'))
                            ->boolean()
                            ->columnSpanFull(),
                        TextEntry::make('credentials_validated_at')
                            ->label(__('filament-satis::package.fields.credentials_validated_at'))
                            ->since()
                            ->columnSpanFull(),
                    ]),
                Section::make(__('filament-satis::package.sections.webhook'))
                    ->visible(fn ($record): bool => $record?->type === PackageType::Github)
                    ->schema([
                        TextEntry::make('webhook_url')
                            ->label(__('filament-satis::package.infolist.webhook_url'))
                            ->copyable()
                            ->copyMessage(__('filament-satis::package.copy_message.webhook_url'))
                            ->copyMessageDuration(1500)
                            ->columnSpanFull(),
                        TextEntry::make('webhook_secret')
                            ->label(__('filament-satis::package.fields.webhook_secret'))
                            ->copyable()
                            ->copyMessage(__('filament-satis::package.copy_message.webhook_secret'))
                            ->copyMessageDuration(1500)
                            ->columnSpanFull(),
                    ]),
                Grid::make()
                    ->relationship('packageRelease')
                    ->schema([
                        Section::make()
                            ->heading(__('filament-satis::package.sections.package_release'))
                            ->columnSpan(1)
                            ->schema([
                                TextEntry::make('version')
                                    ->label(__('filament-satis::package-release.fields.version'))
                                    ->badge()
                                    ->columnSpanFull(),
                                TextEntry::make('time')
                                    ->label(__('filament-satis::package-release.fields.time'))
                                    ->since()
                                    ->columnSpanFull()
                                    ->hidden(fn ($state) => blank($state)),
                                TextEntry::make('type')
                                    ->label(__('filament-satis::package-release.fields.type'))
                                    ->columnSpanFull(),
                                TextEntry::make('description')
                                    ->label(__('filament-satis::package-release.fields.description'))
                                    ->columnSpanFull()
                                    ->hidden(fn ($state) => blank($state)),
                                TextEntry::make('homepage')
                                    ->label(__('filament-satis::package-release.fields.homepage'))
                                    ->columnSpanFull()
                                    ->hidden(fn ($state) => blank($state)),
                            ]),
                        Section::make()
                            ->heading(__('filament-satis::package.sections.dependencies'))
                            ->columnSpan(1)
                            ->schema([
                                RepeatableEntry::make('dependencies')
                                    ->translateLabel(false)
                                    ->hiddenLabel()
                                    ->schema([
                                        TextEntry::make('name')
                                            ->hiddenLabel(),
                                        TextEntry::make('pivot.version')
                                            ->hiddenLabel()
                                            ->badge(),
                                    ])
                                    ->columns()
                                    ->contained(false),
                            ]),
                    ]),
            ]);
    }
}
