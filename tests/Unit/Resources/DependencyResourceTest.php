<?php

use JeffersonGoncalves\FilamentSatis\Resources\DependencyResource;
use JeffersonGoncalves\LaravelSatis\Models\Dependency;

it('resolves the correct model', function () {
    expect(DependencyResource::getModel())->toBe(Dependency::class);
});

it('has navigation icon', function () {
    expect(DependencyResource::getNavigationIcon())->toBe('heroicon-o-link');
});

it('has pages defined', function () {
    $pages = DependencyResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index', 'view']);
});

it('has relation managers defined', function () {
    $relations = DependencyResource::getRelations();

    expect($relations)->toBeArray()
        ->toHaveCount(1);
});
