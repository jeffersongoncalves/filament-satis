<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\PackageResource\Pages;
use JeffersonGoncalves\FilamentSatis\Resources\PackageResource\RelationManagers;
use JeffersonGoncalves\LaravelSatis\Enums\PackageType;
use JeffersonGoncalves\LaravelSatis\Models\Package;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class PackageResource extends Resource
{
    public static function getModel(): string
    {
        return ModelResolver::package();
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-satis.package_resource.navigation_icon', 'heroicon-o-cube');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-satis.package_resource.navigation_sort', 1);
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-satis.navigation_group', 'Satis');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('filament-satis.package_resource.should_register_navigation', true);
    }

    public static function getCluster(): ?string
    {
        return config('filament-satis.package_resource.cluster');
    }

    public static function getSlug(): string
    {
        return config('filament-satis.package_resource.slug', 'satis/packages');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-satis::package.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-satis::package.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-satis::package.plural_model_label');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(null)
            ->schema([
                Forms\Components\Section::make(__('filament-satis::package.sections.general'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('filament-satis::package.fields.name'))
                            ->required()
                            ->maxLength(255)
                            ->placeholder('vendor/package')
                            ->disabled(fn (string $operation): bool => $operation === 'edit')
                            ->rules([
                                fn (Forms\Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
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

                        Forms\Components\Toggle::make('is_dev')
                            ->label(__('filament-satis::package.fields.is_dev'))
                            ->default(false),

                        Forms\Components\ToggleButtons::make('type')
                            ->label(__('filament-satis::package.fields.type'))
                            ->options(PackageType::class)
                            ->required()
                            ->default(PackageType::Composer)
                            ->inline()
                            ->grouped()
                            ->live(),

                        Forms\Components\TextInput::make('url')
                            ->label(__('filament-satis::package.fields.url'))
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make(__('filament-satis::package.sections.credentials'))
                    ->schema([
                        Forms\Components\TextInput::make('username')
                            ->label(__('filament-satis::package.fields.username'))
                            ->maxLength(255),

                        Forms\Components\TextInput::make('password')
                            ->label(__('filament-satis::package.fields.password'))
                            ->password()
                            ->revealable()
                            ->maxLength(255)
                            ->dehydrated(fn (?string $state): bool => filled($state)),
                    ])->columns(2),

                Forms\Components\Section::make(__('filament-satis::package.sections.integration'))
                    ->schema([
                        Forms\Components\TextInput::make('webhook_secret')
                            ->label(__('filament-satis::package.fields.webhook_secret'))
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\TextInput::make('reference')
                            ->label(__('filament-satis::package.fields.reference'))
                            ->disabled()
                            ->dehydrated(false),
                    ])->columns(2)
                    ->visibleOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-satis::package.fields.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_dev')
                    ->label(__('filament-satis::package.fields.is_dev'))
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label(__('filament-satis::package.fields.type'))
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('url')
                    ->label(__('filament-satis::package.fields.url'))
                    ->limit(50)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('releases_count')
                    ->label(__('filament-satis::package.fields.releases_count'))
                    ->counts('releases')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_credentials_validated')
                    ->label(__('filament-satis::package.fields.is_credentials_validated'))
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('credentials_validated_at')
                    ->label(__('filament-satis::package.fields.credentials_validated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament-satis::general.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options(PackageType::class),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(null)
            ->schema([
                Infolists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label(__('filament-satis::package.fields.name'))
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('type')
                            ->label(__('filament-satis::package.fields.type'))
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('url')
                            ->label(__('filament-satis::package.fields.url'))
                            ->columnSpanFull(),
                        Infolists\Components\IconEntry::make('is_dev')
                            ->label(__('filament-satis::package.fields.is_dev'))
                            ->boolean()
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('composer_command')
                            ->label(__('filament-satis::package.infolist.composer_command'))
                            ->copyable()
                            ->copyMessage(__('filament-satis::package.copy_message.composer_command'))
                            ->copyMessageDuration(1500)
                            ->columnSpanFull(),
                    ]),
                Infolists\Components\Section::make(__('filament-satis::package.sections.credentials'))
                    ->schema([
                        Infolists\Components\IconEntry::make('is_credentials_validated')
                            ->label(__('filament-satis::package.fields.is_credentials_validated'))
                            ->boolean()
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('credentials_validated_at')
                            ->label(__('filament-satis::package.fields.credentials_validated_at'))
                            ->dateTime()
                            ->columnSpanFull(),
                    ]),
                Infolists\Components\Section::make(__('filament-satis::package.sections.webhook'))
                    ->visible(fn (Package $record): bool => $record->type === PackageType::Github)
                    ->schema([
                        Infolists\Components\TextEntry::make('webhook_url')
                            ->label(__('filament-satis::package.infolist.webhook_url'))
                            ->copyable()
                            ->copyMessage(__('filament-satis::package.copy_message.webhook_url'))
                            ->copyMessageDuration(1500)
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('webhook_secret')
                            ->label(__('filament-satis::package.fields.webhook_secret'))
                            ->copyable()
                            ->copyMessage(__('filament-satis::package.copy_message.webhook_secret'))
                            ->copyMessageDuration(1500)
                            ->columnSpanFull(),
                    ]),
                Infolists\Components\Grid::make()
                    ->relationship('packageRelease')
                    ->schema([
                        Infolists\Components\Section::make()
                            ->heading(__('filament-satis::package.sections.package_release'))
                            ->columnSpan(1)
                            ->schema([
                                Infolists\Components\TextEntry::make('version')
                                    ->label(__('filament-satis::package-release.fields.version'))
                                    ->badge()
                                    ->columnSpanFull(),
                                Infolists\Components\TextEntry::make('time')
                                    ->label(__('filament-satis::package-release.fields.time'))
                                    ->columnSpanFull()
                                    ->hidden(fn ($state) => blank($state)),
                                Infolists\Components\TextEntry::make('type')
                                    ->label(__('filament-satis::package-release.fields.type'))
                                    ->columnSpanFull(),
                                Infolists\Components\TextEntry::make('description')
                                    ->label(__('filament-satis::package-release.fields.description'))
                                    ->columnSpanFull()
                                    ->hidden(fn ($state) => blank($state)),
                                Infolists\Components\TextEntry::make('homepage')
                                    ->label(__('filament-satis::package-release.fields.homepage'))
                                    ->columnSpanFull()
                                    ->hidden(fn ($state) => blank($state)),
                            ]),
                        Infolists\Components\Section::make()
                            ->heading(__('filament-satis::package.sections.dependencies'))
                            ->columnSpan(1)
                            ->schema([
                                Infolists\Components\RepeatableEntry::make('dependencies')
                                    ->translateLabel(false)
                                    ->hiddenLabel()
                                    ->schema([
                                        Infolists\Components\TextEntry::make('name')
                                            ->hiddenLabel(),
                                        Infolists\Components\TextEntry::make('pivot.version')
                                            ->hiddenLabel()
                                            ->badge(),
                                    ])
                                    ->columns()
                                    ->contained(false),
                            ]),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ReleasesRelationManager::class,
            RelationManagers\DownloadsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'view' => Pages\ViewPackage::route('/{record}'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
