<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\PackageResource\Pages;
use JeffersonGoncalves\FilamentSatis\Resources\PackageResource\RelationManagers;
use JeffersonGoncalves\LaravelSatis\Enums\PackageType;
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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('filament-satis::package.sections.general'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('filament-satis::package.fields.name'))
                            ->required()
                            ->maxLength(255)
                            ->placeholder('vendor/package'),

                        Forms\Components\Select::make('type')
                            ->label(__('filament-satis::package.fields.type'))
                            ->options(PackageType::class)
                            ->required()
                            ->default(PackageType::Composer),

                        Forms\Components\TextInput::make('url')
                            ->label(__('filament-satis::package.fields.url'))
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ])->columns(3),

                Forms\Components\Section::make(__('filament-satis::package.sections.credentials'))
                    ->schema([
                        Forms\Components\TextInput::make('username')
                            ->label(__('filament-satis::package.fields.username'))
                            ->maxLength(255),

                        Forms\Components\TextInput::make('password')
                            ->label(__('filament-satis::package.fields.password'))
                            ->password()
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make(__('filament-satis::package.sections.integration'))
                    ->schema([
                        Forms\Components\TextInput::make('webhook_secret')
                            ->label(__('filament-satis::package.fields.webhook_secret'))
                            ->disabled()
                            ->dehydrated(false)
                            ->visibleOn('edit'),

                        Forms\Components\TextInput::make('reference')
                            ->label(__('filament-satis::package.fields.reference'))
                            ->disabled()
                            ->dehydrated(false)
                            ->visibleOn('edit'),
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

                Tables\Columns\TextColumn::make('type')
                    ->label(__('filament-satis::package.fields.type'))
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('url')
                    ->label(__('filament-satis::package.fields.url'))
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_credentials_validated')
                    ->label(__('filament-satis::package.fields.is_credentials_validated'))
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('credentials_validated_at')
                    ->label(__('filament-satis::package.fields.credentials_validated_at'))
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
