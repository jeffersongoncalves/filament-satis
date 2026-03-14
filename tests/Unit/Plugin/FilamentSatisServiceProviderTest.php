<?php

use JeffersonGoncalves\FilamentSatis\FilamentSatisServiceProvider;

it('registers the filament-satis config', function () {
    expect(config('filament-satis'))->toBeArray();
});

it('publishes config with correct tag', function () {
    $serviceProvider = app()->getProvider(FilamentSatisServiceProvider::class);

    expect($serviceProvider)->not->toBeNull();
});

it('has correct package name', function () {
    expect(FilamentSatisServiceProvider::$name)->toBe('filament-satis');
});
