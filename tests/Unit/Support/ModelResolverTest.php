<?php

use JeffersonGoncalves\FilamentSatis\Models\Dependency;
use JeffersonGoncalves\FilamentSatis\Models\Package;
use JeffersonGoncalves\FilamentSatis\Models\PackageDownload;
use JeffersonGoncalves\FilamentSatis\Models\PackageRelease;
use JeffersonGoncalves\FilamentSatis\Models\Packagist;
use JeffersonGoncalves\FilamentSatis\Models\Token;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

it('resolves package model', function () {
    expect(ModelResolver::package())->toBe(Package::class);
});

it('resolves token model', function () {
    expect(ModelResolver::token())->toBe(Token::class);
});

it('resolves dependency model', function () {
    expect(ModelResolver::dependency())->toBe(Dependency::class);
});

it('resolves package release model', function () {
    expect(ModelResolver::packageRelease())->toBe(PackageRelease::class);
});

it('resolves package download model', function () {
    expect(ModelResolver::packageDownload())->toBe(PackageDownload::class);
});

it('resolves packagist model', function () {
    expect(ModelResolver::packagist())->toBe(Packagist::class);
});
