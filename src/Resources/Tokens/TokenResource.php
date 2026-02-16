<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Tokens;

use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\Pages\CreateToken;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\Pages\EditToken;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\Pages\ListTokens;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\Pages\ViewToken;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\Schemas\TokenForm;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\Tables\TokensTable;
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

    public static function getSlug(?Panel $panel = null): string
    {
        return config('filament-satis.token_resource.slug', 'satis/tokens');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-satis::token.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-satis::token.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-satis::token.plural_model_label');
    }

    public static function form(Schema $schema): Schema
    {
        return TokenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TokensTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTokens::route('/'),
            'create' => CreateToken::route('/create'),
            'view' => ViewToken::route('/{record}'),
            'edit' => EditToken::route('/{record}/edit'),
        ];
    }
}
