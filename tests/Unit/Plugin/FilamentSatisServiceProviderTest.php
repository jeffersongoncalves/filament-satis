<?php

it('registers the filament-satis config', function () {
    expect(config('filament-satis'))->toBeArray();
});

it('publishes config with correct tag', function () {
    $serviceProvider = app()->getProvider(\JeffersonGoncalves\FilamentSatis\FilamentSatisServiceProvider::class);

    expect($serviceProvider)->not->toBeNull();
});

it('has correct package name', function () {
    expect(\JeffersonGoncalves\FilamentSatis\FilamentSatisServiceProvider::$name)->toBe('filament-satis');
});
