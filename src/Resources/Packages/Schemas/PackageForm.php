<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Schemas;

use Closure;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use JeffersonGoncalves\LaravelSatis\Enums\PackageType;

use function JeffersonGoncalves\FilamentSatis\Support\enum_equals;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                TextInput::make('name')
                    ->label(
                        fn (Get $get) => match (PackageType::of($get('type'))) {
                            PackageType::Composer => 'vendor/package',
                            PackageType::Github => 'user/repo',
                        }
                    )
                    ->rule(
                        fn (Get $get): Closure => function (string $attribute, string $value, Closure $fail) use ($get) {
                            if (enum_equals($get('type'), PackageType::Composer)) {
                                if (preg_match('/^[a-z0-9]([_.-]?[a-z0-9]+)*\/[a-z0-9]([_.-]?[a-z0-9]+)*$/', $value)) {
                                    return;
                                }

                                $fail(__('filament-satis::package.validation.composer_name'));
                            }

                            if (enum_equals($get('type'), PackageType::Github)) {
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
                    ->colors([
                        PackageType::Composer->value => 'info',
                        PackageType::Github->value => 'warning',
                    ])
                    ->default(PackageType::Composer)
                    ->required()
                    ->disabled(fn ($context) => $context === 'edit'),

                Select::make('credential_id')
                    ->label(__('filament-satis::package.form.credential'))
                    ->relationship('credential', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->name} ({$record->email})")
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
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
                            ->required(),
                    ]),

                Fieldset::make()
                    ->columns()
                    ->schema([
                        TextEntry::make(__('filament-satis::package.instructions.composer.label'))
                            ->state(fn () => __('filament-satis::package.instructions.composer.content'))
                            ->visible(fn (Get $get): bool => enum_equals($get('type'), PackageType::Composer))
                            ->columnSpanFull(),

                        TextEntry::make(__('filament-satis::package.instructions.github.label'))
                            ->state(fn () => __('filament-satis::package.instructions.github.content'))
                            ->visible(fn (Get $get): bool => enum_equals($get('type'), PackageType::Github))
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
