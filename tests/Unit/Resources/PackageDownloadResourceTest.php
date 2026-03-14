<?php

use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\PackageDownloadResource;
use JeffersonGoncalves\LaravelSatis\Models\PackageDownload;

it('resolves the correct model', function () {
    expect(PackageDownloadResource::getModel())->toBe(PackageDownload::class);
});

it('reads navigation icon from config', function () {
    expect(PackageDownloadResource::getNavigationIcon())->toBe('heroicon-o-arrow-down-tray');

    config(['filament-satis.package_download_resource.navigation_icon' => 'heroicon-o-star']);
    expect(PackageDownloadResource::getNavigationIcon())->toBe('heroicon-o-star');
});

it('reads navigation sort from config', function () {
    expect(PackageDownloadResource::getNavigationSort())->toBe(5);
});

it('reads slug from config', function () {
    expect(PackageDownloadResource::getSlug())->toBe('satis/package-downloads');
});

it('reads should_register_navigation from config', function () {
    expect(PackageDownloadResource::shouldRegisterNavigation())->toBeTrue();
});

it('reads cluster from config', function () {
    expect(PackageDownloadResource::getCluster())->toBeNull();
});

it('has pages defined', function () {
    $pages = PackageDownloadResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index']);
});
