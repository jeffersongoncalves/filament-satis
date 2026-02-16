<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\TokenResource\Pages;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class TokenResource extends Resource
{
    public static function getModel(): string
    {
        return ModelResolver::token();
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-satis.token_resource.navigation_icon', 'heroicon-o-key');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-satis.token_resource.navigation_sort', 2);
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-satis.navigation_group', 'Satis');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('filament-satis.token_resource.should_register_navigation', true);
    }

    public static function getCluster(): ?string
    {
        return config('filament-satis.token_resource.cluster');
    }

    public static function getSlug(): string
    {
        return config('filament-satis.token_resource.slug', 'satis/tokens');
    }

    public static function getNavigationLabel(): string
    {
        return __('laravel-satis::token.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('laravel-satis::token.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('laravel-satis::token.plural_model_label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('laravel-satis::token.sections.general'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('laravel-satis::token.fields.name'))
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label(__('laravel-satis::token.fields.email'))
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('token')
                            ->label(__('laravel-satis::token.fields.token'))
                            ->disabled()
                            ->dehydrated(false)
                            ->visibleOn('edit')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make(__('laravel-satis::token.sections.packages'))
                    ->schema([
                        Forms\Components\Select::make('packages')
                            ->label(__('laravel-satis::token.fields.packages'))
                            ->relationship('packages', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable(),
                    ])
                    ->visibleOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('laravel-satis::token.fields.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('laravel-satis::token.fields.email'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('packages_count')
                    ->label(__('laravel-satis::token.fields.packages_count'))
                    ->counts('packages')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-satis::general.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTokens::route('/'),
            'create' => Pages\CreateToken::route('/create'),
            'view' => Pages\ViewToken::route('/{record}'),
            'edit' => Pages\EditToken::route('/{record}/edit'),
        ];
    }
}
