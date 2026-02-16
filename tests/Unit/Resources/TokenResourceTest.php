<?php

use JeffersonGoncalves\FilamentSatis\Resources\Tokens\TokenResource;
use JeffersonGoncalves\LaravelSatis\Models\Token;

it('resolves the correct model', function () {
    expect(TokenResource::getModel())->toBe(Token::class);
});

it('reads navigation icon from config', function () {
    expect(TokenResource::getNavigationIcon())->toBe('heroicon-o-key');

    config(['filament-satis.token_resource.navigation_icon' => 'heroicon-o-star']);
    expect(TokenResource::getNavigationIcon())->toBe('heroicon-o-star');
});

it('reads navigation sort from config', function () {
    expect(TokenResource::getNavigationSort())->toBe(2);

    config(['filament-satis.token_resource.navigation_sort' => 99]);
    expect(TokenResource::getNavigationSort())->toBe(99);
});

it('reads slug from config', function () {
    expect(TokenResource::getSlug())->toBe('satis/tokens');

    config(['filament-satis.token_resource.slug' => 'custom/tokens']);
    expect(TokenResource::getSlug())->toBe('custom/tokens');
});

it('reads should_register_navigation from config', function () {
    expect(TokenResource::shouldRegisterNavigation())->toBeTrue();

    config(['filament-satis.token_resource.should_register_navigation' => false]);
    expect(TokenResource::shouldRegisterNavigation())->toBeFalse();
});

it('reads cluster from config', function () {
    expect(TokenResource::getCluster())->toBeNull();
});

it('has pages defined', function () {
    $pages = TokenResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index', 'create', 'view', 'edit']);
});
