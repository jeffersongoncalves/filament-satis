<?php

use JeffersonGoncalves\FilamentSatis\Actions\ProcessPackageFilename;

it('parses vendor/package format', function () {
    $action = new ProcessPackageFilename;
    $result = $action->execute('vendor/package');

    expect($result['vendor'])->toBe('vendor');
    expect($result['package'])->toBe('package');
    expect($result['full_name'])->toBe('vendor/package');
});

it('parses dash-separated format', function () {
    $action = new ProcessPackageFilename;
    $result = $action->execute('vendor-package-1.0.0-abc123.zip');

    expect($result['vendor'])->toBe('vendor');
    expect($result['package'])->toBe('package');
    expect($result['full_name'])->toBe('vendor/package');
});

it('handles single name', function () {
    $action = new ProcessPackageFilename;
    $result = $action->execute('package');

    expect($result['package'])->toBe('package');
    expect($result['full_name'])->toBe('package');
});
