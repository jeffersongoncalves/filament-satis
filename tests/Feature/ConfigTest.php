<?php

it('loads filament-satis config file', function () {
    expect(config('filament-satis'))->toBeArray();
});

it('has default navigation group', function () {
    expect(config('filament-satis.navigation_group'))->toBe('Satis');
});

it('has package_resource config with all keys', function () {
    $config = config('filament-satis.package_resource');

    expect($config)->toBeArray()
        ->toHaveKeys(['cluster', 'should_register_navigation', 'navigation_icon', 'navigation_sort', 'slug']);

    expect($config['cluster'])->toBeNull();
    expect($config['should_register_navigation'])->toBeTrue();
    expect($config['navigation_icon'])->toBe('heroicon-o-cube');
    expect($config['navigation_sort'])->toBe(1);
    expect($config['slug'])->toBe('satis/packages');
});

it('has token_resource config with all keys', function () {
    $config = config('filament-satis.token_resource');

    expect($config)->toBeArray()
        ->toHaveKeys(['cluster', 'should_register_navigation', 'navigation_icon', 'navigation_sort', 'slug']);

    expect($config['navigation_icon'])->toBe('heroicon-o-key');
    expect($config['navigation_sort'])->toBe(2);
    expect($config['slug'])->toBe('satis/tokens');
});

it('has package_release_resource config with all keys', function () {
    $config = config('filament-satis.package_release_resource');

    expect($config)->toBeArray()
        ->toHaveKeys(['cluster', 'should_register_navigation', 'navigation_icon', 'navigation_sort', 'slug']);

    expect($config['navigation_icon'])->toBe('heroicon-o-tag');
    expect($config['navigation_sort'])->toBe(3);
    expect($config['slug'])->toBe('satis/package-releases');
});

it('has package_download_resource config with all keys', function () {
    $config = config('filament-satis.package_download_resource');

    expect($config)->toBeArray()
        ->toHaveKeys(['cluster', 'should_register_navigation', 'navigation_icon', 'navigation_sort', 'slug']);

    expect($config['navigation_icon'])->toBe('heroicon-o-arrow-down-tray');
    expect($config['navigation_sort'])->toBe(4);
    expect($config['slug'])->toBe('satis/package-downloads');
});

it('has dependency_resource config with all keys', function () {
    $config = config('filament-satis.dependency_resource');

    expect($config)->toBeArray()
        ->toHaveKeys(['cluster', 'should_register_navigation', 'navigation_icon', 'navigation_sort', 'slug']);

    expect($config['navigation_icon'])->toBe('heroicon-o-link');
    expect($config['navigation_sort'])->toBe(5);
    expect($config['slug'])->toBe('satis/dependencies');
});

it('loads satis config as dependency', function () {
    expect(config('satis'))->toBeArray();
});

it('satis has default models configured', function () {
    $models = config('satis.models');

    expect($models)->toBeArray()
        ->and($models['package'])->toBe(\JeffersonGoncalves\LaravelSatis\Models\Package::class)
        ->and($models['token'])->toBe(\JeffersonGoncalves\LaravelSatis\Models\Token::class);
});
