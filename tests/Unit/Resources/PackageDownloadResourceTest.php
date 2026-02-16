<?php

use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloadResource;
use JeffersonGoncalves\LaravelSatis\Models\PackageDownload;

it('resolves the correct model', function () {
    expect(PackageDownloadResource::getModel())->toBe(PackageDownload::class);
});

it('has navigation icon', function () {
    expect(PackageDownloadResource::getNavigationIcon())->toBe('heroicon-o-arrow-down-tray');
});

it('has pages defined', function () {
    $pages = PackageDownloadResource::getPages();

    expect($pages)->toBeArray()
        ->toHaveKeys(['index']);
});
