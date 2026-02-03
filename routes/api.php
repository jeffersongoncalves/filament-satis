<?php

use Illuminate\Support\Facades\Route;
use JeffersonGoncalves\FilamentSatis\Controllers\DownloadComposerController;
use JeffersonGoncalves\FilamentSatis\Controllers\GithubWebhookController;
use JeffersonGoncalves\FilamentSatis\Middleware\EnsureUserHasLicense;

$prefix = config('filament-satis.routes.api_prefix', 'api/satis');
$middleware = config('filament-satis.routes.middleware', ['api']);

$composerPrefix = config('filament-satis.tenancy.enabled')
    ? '{tenant}/composer/downloads'
    : 'composer/downloads';

Route::prefix($prefix)
    ->middleware($middleware)
    ->group(function () use ($composerPrefix) {
        Route::post($composerPrefix, [DownloadComposerController::class, 'store'])
            ->middleware(EnsureUserHasLicense::class);

        Route::post('webhooks/github/{package:reference}', [GithubWebhookController::class, 'handle']);
    });
