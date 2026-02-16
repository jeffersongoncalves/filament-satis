<?php

use JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\PackageReleaseResource;
use JeffersonGoncalves\LaravelSatis\Models\PackageRelease;

it('resolves the correct model', function () {
    expect(PackageReleaseResource::getModel())->toBe(PackageRelease::class);
});

it('reads navigation icon from config', function () {
    expect(PackageReleaseResource::getNavigationIcon())->toBe('heroicon-o-tag');

    config(['filament-satis.package_release_resource.navigation_icon' => 'heroicon-o-star']);
    expect(PackageReleaseResource::getNavigationIcon())->toBe('heroicon-o-star');
});

it('reads navigation sort from config', function () {
    expect(PackageReleaseResource::getNavigationSort())->toBe(3);

    config(['filament-satis.package_release_resource.navigation_sort' => 99]);
    expect(PackageReleaseResource::getNavigationSort())->toBe(99);
});

it('reads slug from config', function () {
    expect(PackageReleaseResource::getSlug())->toBe('satis/package-releases');
});

it('reads should_register_navigation from config', function () {
    expect(PackageReleaseResource::shouldRegisterNavigation())->toBeTrue();
});

it('reads cluster from config', function () {
    expect(PackageReleaseResource::getCluster())->toBeNull();
});

it('has pages defined', function () {
    $pages = PackageReleaseResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index', 'view']);
});
