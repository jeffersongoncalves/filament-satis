<?php

use JeffersonGoncalves\FilamentSatis\Enums\PackageType;

it('has correct values', function () {
    expect(PackageType::Composer->value)->toBe('composer');
    expect(PackageType::Github->value)->toBe('github');
});

it('has labels', function () {
    expect(PackageType::Composer->getLabel())->toBeString();
    expect(PackageType::Github->getLabel())->toBeString();
});

it('has icons', function () {
    expect(PackageType::Composer->getIcon())->toStartWith('heroicon-');
    expect(PackageType::Github->getIcon())->toStartWith('heroicon-');
});
