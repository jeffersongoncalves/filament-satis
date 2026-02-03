<?php

use JeffersonGoncalves\FilamentSatis\Enums\PackageType;
use JeffersonGoncalves\FilamentSatis\Models\Package;
use JeffersonGoncalves\FilamentSatis\Support\SatisConfig;

it('builds configuration array', function () {
    $config = SatisConfig::make()
        ->setPackages(collect())
        ->setHomepage('https://example.com');

    $result = $config->toArray();

    expect($result)
        ->toHaveKey('homepage', 'https://example.com')
        ->toHaveKey('repositories')
        ->toHaveKey('require');
});

it('generates json output', function () {
    $config = SatisConfig::make()
        ->setPackages(collect())
        ->setHomepage('https://example.com');

    $json = $config->toJson();

    expect($json)->toBeString();
    expect(json_decode($json, true))->toBeArray();
});

it('builds repositories from packages', function () {
    $package = new Package([
        'name' => 'vendor/package',
        'type' => PackageType::Composer,
        'url' => 'https://repo.example.com',
    ]);

    $config = SatisConfig::make()
        ->setPackages(collect([$package]))
        ->setHomepage('https://example.com');

    $result = $config->toArray();

    expect($result['repositories'])->toHaveCount(1);
    expect($result['repositories'][0]['type'])->toBe('composer');
    expect($result['repositories'][0]['url'])->toBe('https://repo.example.com');
    expect($result['require'])->toHaveKey('vendor/package', '*');
});

it('maps github packages to vcs type', function () {
    $package = new Package([
        'name' => 'vendor/package',
        'type' => PackageType::Github,
        'url' => 'https://github.com/vendor/package.git',
    ]);

    $config = SatisConfig::make()
        ->setPackages(collect([$package]))
        ->setHomepage('https://example.com');

    $result = $config->toArray();

    expect($result['repositories'][0]['type'])->toBe('vcs');
});
