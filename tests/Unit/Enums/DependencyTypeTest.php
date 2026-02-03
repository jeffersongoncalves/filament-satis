<?php

use JeffersonGoncalves\FilamentSatis\Enums\DependencyType;

it('has correct values', function () {
    expect(DependencyType::Public->value)->toBe('public');
    expect(DependencyType::Private->value)->toBe('private');
});

it('has labels', function () {
    expect(DependencyType::Public->getLabel())->toBeString();
    expect(DependencyType::Private->getLabel())->toBeString();
});

it('has icons', function () {
    expect(DependencyType::Public->getIcon())->toStartWith('heroicon-');
    expect(DependencyType::Private->getIcon())->toStartWith('heroicon-');
});

it('has colors', function () {
    expect(DependencyType::Public->getColor())->toBe('success');
    expect(DependencyType::Private->getColor())->toBe('warning');
});
