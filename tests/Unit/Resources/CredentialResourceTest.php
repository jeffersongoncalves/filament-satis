<?php

use JeffersonGoncalves\FilamentSatis\Resources\Credentials\CredentialResource;
use JeffersonGoncalves\LaravelSatis\Models\Credential;

it('resolves the correct model', function () {
    expect(CredentialResource::getModel())->toBe(Credential::class);
});

it('reads navigation icon from config', function () {
    expect(CredentialResource::getNavigationIcon())->toBe('heroicon-o-shield-check');

    config(['filament-satis.credential_resource.navigation_icon' => 'heroicon-o-star']);
    expect(CredentialResource::getNavigationIcon())->toBe('heroicon-o-star');
});

it('reads navigation sort from config', function () {
    expect(CredentialResource::getNavigationSort())->toBe(2);

    config(['filament-satis.credential_resource.navigation_sort' => 99]);
    expect(CredentialResource::getNavigationSort())->toBe(99);
});

it('reads navigation group from config', function () {
    expect(CredentialResource::getNavigationGroup())->toBe('Satis');

    config(['filament-satis.navigation_group' => 'Custom']);
    expect(CredentialResource::getNavigationGroup())->toBe('Custom');
});

it('reads slug from config', function () {
    expect(CredentialResource::getSlug())->toBe('satis/credentials');

    config(['filament-satis.credential_resource.slug' => 'custom/credentials']);
    expect(CredentialResource::getSlug())->toBe('custom/credentials');
});

it('reads should_register_navigation from config', function () {
    expect(CredentialResource::shouldRegisterNavigation())->toBeTrue();

    config(['filament-satis.credential_resource.should_register_navigation' => false]);
    expect(CredentialResource::shouldRegisterNavigation())->toBeFalse();
});

it('reads cluster from config', function () {
    expect(CredentialResource::getCluster())->toBeNull();

    config(['filament-satis.credential_resource.cluster' => 'App\\Filament\\Clusters\\Satis']);
    expect(CredentialResource::getCluster())->toBe('App\\Filament\\Clusters\\Satis');
});

it('has pages defined', function () {
    $pages = CredentialResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index', 'create', 'view', 'edit']);
});

it('has globally searchable attributes', function () {
    expect(CredentialResource::getGloballySearchableAttributes())
        ->toBe(['name', 'url']);
});
