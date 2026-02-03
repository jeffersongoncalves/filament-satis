<?php

use Illuminate\Support\Facades\Route;
use JeffersonGoncalves\FilamentSatis\Controllers\ArchivesController;
use JeffersonGoncalves\FilamentSatis\Controllers\IncludeController;
use JeffersonGoncalves\FilamentSatis\Controllers\PackagesController;
use JeffersonGoncalves\FilamentSatis\Controllers\PackagesV2Controller;
use JeffersonGoncalves\FilamentSatis\Middleware\EnsureUserHasLicense;

$prefix = config('filament-satis.routes.composer_prefix', 'satis');
$middleware = config('filament-satis.routes.middleware', ['api']);

Route::prefix($prefix)
    ->middleware([...$middleware, EnsureUserHasLicense::class])
    ->group(function () {
        Route::get('packages.json', [PackagesController::class, 'index']);
        Route::get('include/{include}.json', [IncludeController::class, 'show']);
        Route::get('p2/{vendor}/{package}.json', [PackagesV2Controller::class, 'show']);
        Route::get('archives/{vendor}/{package}/{file}', [ArchivesController::class, 'show']);
    });
