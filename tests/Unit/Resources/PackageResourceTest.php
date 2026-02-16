<?php

use JeffersonGoncalves\FilamentSatis\Resources\PackageResource;
use JeffersonGoncalves\LaravelSatis\Models\Package;

it('resolves the correct model', function () {
    expect(PackageResource::getModel())->toBe(Package::class);
});

it('reads navigation icon from config', function () {
    expect(PackageResource::getNavigationIcon())->toBe('heroicon-o-cube');

    config(['filament-satis.package_resource.navigation_icon' => 'heroicon-o-star']);
    expect(PackageResource::getNavigationIcon())->toBe('heroicon-o-star');
});

it('reads navigation sort from config', function () {
    expect(PackageResource::getNavigationSort())->toBe(1);

    config(['filament-satis.package_resource.navigation_sort' => 99]);
    expect(PackageResource::getNavigationSort())->toBe(99);
});

it('reads navigation group from config', function () {
    expect(PackageResource::getNavigationGroup())->toBe('Satis');

    config(['filament-satis.navigation_group' => 'Custom']);
    expect(PackageResource::getNavigationGroup())->toBe('Custom');
});

it('reads slug from config', function () {
    expect(PackageResource::getSlug())->toBe('satis/packages');

    config(['filament-satis.package_resource.slug' => 'custom/packages']);
    expect(PackageResource::getSlug())->toBe('custom/packages');
});

it('reads should_register_navigation from config', function () {
    expect(PackageResource::shouldRegisterNavigation())->toBeTrue();

    config(['filament-satis.package_resource.should_register_navigation' => false]);
    expect(PackageResource::shouldRegisterNavigation())->toBeFalse();
});

it('reads cluster from config', function () {
    expect(PackageResource::getCluster())->toBeNull();

    config(['filament-satis.package_resource.cluster' => 'App\\Filament\\Clusters\\Satis']);
    expect(PackageResource::getCluster())->toBe('App\\Filament\\Clusters\\Satis');
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
