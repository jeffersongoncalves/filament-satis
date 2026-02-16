<?php

use JeffersonGoncalves\FilamentSatis\Resources\TokenResource;
use JeffersonGoncalves\LaravelSatis\Models\Token;

it('resolves the correct model', function () {
    expect(TokenResource::getModel())->toBe(Token::class);
});

it('has navigation icon', function () {
    expect(TokenResource::getNavigationIcon())->toBe('heroicon-o-key');
});

it('has pages defined', function () {
    $pages = TokenResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index', 'create', 'view', 'edit']);
});
