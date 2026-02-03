<?php

it('loads config file', function () {
    expect(config('filament-satis'))->toBeArray();
});

it('has default table prefix', function () {
    expect(config('filament-satis.table_prefix'))->toBe('satis_');
});

it('has tenancy disabled by default', function () {
    expect(config('filament-satis.tenancy.enabled'))->toBeFalse();
});

it('has default storage disk', function () {
    expect(config('filament-satis.storage_disk'))->toBe('local');
});

it('has default storage path', function () {
    expect(config('filament-satis.storage_path'))->toBe('satis');
});

it('has default auth guard', function () {
    expect(config('filament-satis.auth.guard'))->toBe('satis-token');
});

it('has default models configured', function () {
    $models = config('filament-satis.models');

    expect($models)->toBeArray();
    expect($models['package'])->toBe(\JeffersonGoncalves\FilamentSatis\Models\Package::class);
    expect($models['token'])->toBe(\JeffersonGoncalves\FilamentSatis\Models\Token::class);
});

it('has schedule configuration', function () {
    $schedule = config('filament-satis.schedule');

    expect($schedule['build'])->toBe('weekly');
    expect($schedule['validate'])->toBe('hourly');
    expect($schedule['dependencies'])->toBe('weekly');
});
