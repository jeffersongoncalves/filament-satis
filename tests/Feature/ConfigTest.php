<?php

it('loads filament-satis config file', function () {
    expect(config('filament-satis'))->toBeArray();
});

it('has default navigation group', function () {
    expect(config('filament-satis.navigation.group'))->toBe('Satis');
});

it('has default navigation icon', function () {
    expect(config('filament-satis.navigation.icon'))->toBe('heroicon-o-archive-box');
});

it('has default navigation sort', function () {
    expect(config('filament-satis.navigation.sort'))->toBe(50);
});

it('loads laravel-satis config as dependency', function () {
    expect(config('laravel-satis'))->toBeArray();
});

it('laravel-satis has default models configured', function () {
    $models = config('laravel-satis.models');

    expect($models)->toBeArray()
        ->and($models['package'])->toBe(\JeffersonGoncalves\LaravelSatis\Models\Package::class)
        ->and($models['token'])->toBe(\JeffersonGoncalves\LaravelSatis\Models\Token::class);
});
