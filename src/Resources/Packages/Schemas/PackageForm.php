<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Schemas;

use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use JeffersonGoncalves\LaravelSatis\Enums\PackageType;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                TextInput::make('name')
                    ->label(
                        fn (Get $get) => match (PackageType::tryFrom($get('type'))) {
                            PackageType::Github => 'user/repo',
                            default => 'vendor/package',
                        }
                    )
                    ->rule(
                        fn (Get $get): Closure => function (string $attribute, string $value, Closure $fail) use ($get) {
                            $type = PackageType::tryFrom($get('type'));

                            if ($type === PackageType::Composer) {
                                if (preg_match('/^[a-z0-9]([_.-]?[a-z0-9]+)*\/[a-z0-9]([_.-]?[a-z0-9]+)*$/', $value)) {
                                    return;
                                }

                                $fail(__('filament-satis::package.validation.composer_name'));
                            }

                            if ($type === PackageType::Github) {
                                if (preg_match('/^[a-zA-Z0-9._-]+\/[a-zA-Z0-9._-]+$/', $value)) {
                                    return;
                                }

                                $fail(__('filament-satis::package.validation.github_name'));
                            }
                        },
                    )
                    ->required()
                    ->disabled(fn ($context) => $context === 'edit'),

                Toggle::make('is_dev')
                    ->label(__('filament-satis::package.fields.is_dev'))
                    ->default(false),

                ToggleButtons::make('type')
                    ->hidden(fn ($context): bool => $context === 'edit')
                    ->hiddenLabel()
                    ->live()
                    ->options(PackageType::class)
                    ->default(PackageType::Composer)
                    ->required()
                    ->disabled(fn ($context) => $context === 'edit'),

                Fieldset::make()
                    ->columns()
                    ->schema([
                        TextEntry::make(__('filament-satis::package.instructions.composer.label'))
                            ->state(fn () => __('filament-satis::package.instructions.composer.content'))
                            ->visible(fn (Get $get): bool => PackageType::tryFrom($get('type')) === PackageType::Composer)
                            ->columnSpanFull(),

                        TextEntry::make(__('filament-satis::package.instructions.github.label'))
                            ->state(fn () => __('filament-satis::package.instructions.github.content'))
                            ->visible(fn (Get $get): bool => PackageType::tryFrom($get('type')) === PackageType::Github)
                            ->columnSpanFull(),

                        TextInput::make('url')
                            ->label(
                                fn (Get $get) => match (PackageType::tryFrom($get('type'))) {
                                    PackageType::Github => __('filament-satis::package.form.url.github'),
                                    default => __('filament-satis::package.form.url.composer'),
                                }
                            )
                            ->rule(
                                fn (Get $get): Closure => function (string $attribute, string $value, Closure $fail) use ($get) {
                                    if (PackageType::tryFrom($get('type')) !== PackageType::Github) {
                                        return filter_var($value, FILTER_VALIDATE_URL);
                                    }

                                    if (preg_match('/^git@github.com:/', $value)) {
                                        return;
                                    }

                                    $fail(__('filament-satis::package.validation.github_url'));
                                },
                            )
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('username')
                            ->label(
                                fn (Get $get) => match (PackageType::tryFrom($get('type'))) {
                                    PackageType::Github => __('filament-satis::package.form.username.github'),
                                    default => __('filament-satis::package.form.username.composer'),
                                }
                            )
                            ->required(),

                        TextInput::make('password')
                            ->label(
                                fn (Get $get) => match (PackageType::tryFrom($get('type'))) {
                                    PackageType::Github => __('filament-satis::package.form.password.github'),
                                    default => __('filament-satis::package.form.password.composer'),
                                }
                            )
                            ->password()
                            ->revealable()
                            ->rule(
                                fn (Get $get): Closure => function (string $attribute, string $value, Closure $fail) use ($get) {
                                    if (PackageType::tryFrom($get('type')) !== PackageType::Github) {
                                        return;
                                    }

                                    if (preg_match('/^github_pat_/', $value)) {
                                        return;
                                    }

                                    $fail(__('filament-satis::package.validation.github_token'));
                                },
                            )
                            ->required(fn (string $context): bool => $context === 'create')
                            ->dehydrated(fn ($state) => filled($state)),
                    ]),
            ]);
    }
}
