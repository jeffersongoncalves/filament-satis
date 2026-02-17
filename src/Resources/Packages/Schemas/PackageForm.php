<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Schemas;

use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use JeffersonGoncalves\LaravelSatis\Enums\PackageType;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('filament-satis::package.sections.general'))
                    ->schema([
                        TextInput::make('name')
                            ->label(__('filament-satis::package.fields.name'))
                            ->required()
                            ->maxLength(255)
                            ->placeholder('vendor/package')
                            ->disabled(fn (string $operation): bool => $operation === 'edit')
                            ->rules([
                                fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                                    $type = $get('type');
                                    if ($type === PackageType::Composer->value || $type === PackageType::Composer) {
                                        if (! preg_match('/^[a-z0-9]([_.-]?[a-z0-9]+)*\/[a-z0-9]([_.-]?[a-z0-9]+)*$/', $value)) {
                                            $fail(__('filament-satis::package.validation.composer_name'));
                                        }
                                    } elseif ($type === PackageType::Github->value || $type === PackageType::Github) {
                                        if (! preg_match('/^[a-zA-Z0-9._-]+\/[a-zA-Z0-9._-]+$/', $value)) {
                                            $fail(__('filament-satis::package.validation.github_name'));
                                        }
                                    }
                                },
                            ]),

                        Toggle::make('is_dev')
                            ->label(__('filament-satis::package.fields.is_dev'))
                            ->default(false),

                        ToggleButtons::make('type')
                            ->label(__('filament-satis::package.fields.type'))
                            ->options(PackageType::class)
                            ->required()
                            ->default(PackageType::Composer)
                            ->inline()
                            ->grouped()
                            ->live(),

                        TextInput::make('url')
                            ->label(__('filament-satis::package.fields.url'))
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ])->columns(2),

                Section::make(__('filament-satis::package.sections.credentials'))
                    ->schema([
                        TextInput::make('username')
                            ->label(__('filament-satis::package.fields.username'))
                            ->maxLength(255),

                        TextInput::make('password')
                            ->label(__('filament-satis::package.fields.password'))
                            ->password()
                            ->revealable()
                            ->maxLength(255)
                            ->dehydrated(fn (?string $state): bool => filled($state)),
                    ])->columns(2),

                Section::make(__('filament-satis::package.sections.integration'))
                    ->schema([
                        TextInput::make('webhook_secret')
                            ->label(__('filament-satis::package.fields.webhook_secret'))
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('reference')
                            ->label(__('filament-satis::package.fields.reference'))
                            ->disabled()
                            ->dehydrated(false),
                    ])->columns(2)
                    ->visibleOn('edit'),
            ]);
    }
}
