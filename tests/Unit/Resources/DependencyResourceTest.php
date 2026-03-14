<?php

use JeffersonGoncalves\FilamentSatis\Resources\DependencyResource;
use JeffersonGoncalves\LaravelSatis\Models\Dependency;

it('resolves the correct model', function () {
    expect(DependencyResource::getModel())->toBe(Dependency::class);
});

it('reads navigation icon from config', function () {
    expect(DependencyResource::getNavigationIcon())->toBe('heroicon-o-link');

    config(['filament-satis.dependency_resource.navigation_icon' => 'heroicon-o-star']);
    expect(DependencyResource::getNavigationIcon())->toBe('heroicon-o-star');
});

it('reads navigation sort from config', function () {
    expect(DependencyResource::getNavigationSort())->toBe(6);

    config(['filament-satis.dependency_resource.navigation_sort' => 99]);
    expect(DependencyResource::getNavigationSort())->toBe(99);
});

it('reads slug from config', function () {
    expect(DependencyResource::getSlug())->toBe('satis/dependencies');

    config(['filament-satis.dependency_resource.slug' => 'custom/deps']);
    expect(DependencyResource::getSlug())->toBe('custom/deps');
});

it('reads should_register_navigation from config', function () {
    expect(DependencyResource::shouldRegisterNavigation())->toBeTrue();

    config(['filament-satis.dependency_resource.should_register_navigation' => false]);
    expect(DependencyResource::shouldRegisterNavigation())->toBeFalse();
});

it('reads cluster from config', function () {
    expect(DependencyResource::getCluster())->toBeNull();
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
