<?php

use JeffersonGoncalves\FilamentSatis\FilamentSatisPlugin;

it('can be instantiated via make', function () {
    $plugin = FilamentSatisPlugin::make();

    expect($plugin)->toBeInstanceOf(FilamentSatisPlugin::class);
});

it('has correct plugin id', function () {
    $plugin = FilamentSatisPlugin::make();

    expect($plugin->getId())->toBe('filament-satis');
});

it('has multi-tenancy disabled by default', function () {
    $plugin = FilamentSatisPlugin::make();

    expect($plugin->hasMultiTenancy())->toBeFalse();
});

it('can enable multi-tenancy', function () {
    $plugin = FilamentSatisPlugin::make()
        ->tenancy(true, 'App\\Models\\Team', 'team_id');

    expect($plugin->hasMultiTenancy())->toBeTrue();
    expect($plugin->getTenantModel())->toBe('App\\Models\\Team');
    expect($plugin->getTenantForeignKey())->toBe('team_id');
});

it('can disable multi-tenancy', function () {
    $plugin = FilamentSatisPlugin::make()
        ->tenancy(true, 'App\\Models\\Team', 'team_id')
        ->tenancy(false);

    expect($plugin->hasMultiTenancy())->toBeFalse();
});

it('does not have navigation group or sort methods', function () {
    $plugin = FilamentSatisPlugin::make();

    expect(method_exists($plugin, 'navigationGroup'))->toBeFalse();
    expect(method_exists($plugin, 'navigationSort'))->toBeFalse();
});
