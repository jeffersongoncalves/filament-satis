<?php

use JeffersonGoncalves\FilamentSatis\Resources\PackageResource;
use JeffersonGoncalves\LaravelSatis\Models\Package;

it('resolves the correct model', function () {
    expect(PackageResource::getModel())->toBe(Package::class);
});

it('has navigation icon', function () {
    expect(PackageResource::getNavigationIcon())->toBe('heroicon-o-cube');
});

it('has pages defined', function () {
    $pages = PackageResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index', 'create', 'view', 'edit']);
});

it('has relation managers defined', function () {
    $relations = PackageResource::getRelations();

    expect($relations)->toBeArray()
        ->toHaveCount(2);
});
