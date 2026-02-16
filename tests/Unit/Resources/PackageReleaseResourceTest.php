<?php

use JeffersonGoncalves\FilamentSatis\Resources\PackageReleaseResource;
use JeffersonGoncalves\LaravelSatis\Models\PackageRelease;

it('resolves the correct model', function () {
    expect(PackageReleaseResource::getModel())->toBe(PackageRelease::class);
});

it('has navigation icon', function () {
    expect(PackageReleaseResource::getNavigationIcon())->toBe('heroicon-o-tag');
});

it('has pages defined', function () {
    $pages = PackageReleaseResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index', 'view']);
});
