<?php

use JeffersonGoncalves\FilamentSatis\Models\Package;

it('uses configured table prefix', function () {
    $package = new Package;

    expect($package->getTable())->toBe('satis_packages');
});

it('casts type to PackageType enum', function () {
    $package = new Package;
    $casts = $package->getCasts();

    expect($casts['type'])->toBe(\JeffersonGoncalves\FilamentSatis\Enums\PackageType::class);
});

it('casts is_credentials_validated to boolean', function () {
    $package = new Package;
    $casts = $package->getCasts();

    expect($casts['is_credentials_validated'])->toBe('boolean');
});

it('hides sensitive attributes', function () {
    $package = new Package;
    $hidden = $package->getHidden();

    expect($hidden)->toContain('password', 'username', 'webhook_secret');
});
