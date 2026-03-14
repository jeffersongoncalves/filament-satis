<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Credentials;

use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\Pages\CreateCredential;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\Pages\EditCredential;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\Pages\ListCredentials;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\Pages\ViewCredential;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\Schemas\CredentialForm;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\Schemas\CredentialInfolist;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\Tables\CredentialsTable;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class CredentialResource extends Resource
{
    public static function getModel(): string
    {
        return ModelResolver::credential();
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-satis.credential_resource.navigation_icon', 'heroicon-o-shield-check');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-satis.credential_resource.navigation_sort', 2);
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-satis.navigation_group', 'Satis');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('filament-satis.credential_resource.should_register_navigation', true);
    }

    public static function getCluster(): ?string
    {
        return config('filament-satis.credential_resource.cluster');
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return config('filament-satis.credential_resource.slug', 'satis/credentials');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-satis::credential.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-satis::credential.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-satis::credential.plural_model_label');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'url'];
    }

    public static function form(Schema $schema): Schema
    {
        return CredentialForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CredentialInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CredentialsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCredentials::route('/'),
            'create' => CreateCredential::route('/create'),
            'view' => ViewCredential::route('/{record}'),
            'edit' => EditCredential::route('/{record}/edit'),
        ];
    }
}
