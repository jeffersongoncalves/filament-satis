<?php

namespace JeffersonGoncalves\FilamentSatis\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JeffersonGoncalves\FilamentSatis\Jobs\SyncTenantPackages;
use JeffersonGoncalves\FilamentSatis\Models\Package;

class GithubWebhookController extends Controller
{
    public function handle(Request $request, Package $package): JsonResponse
    {
        // Verify webhook signature
        $signature = $request->header('X-Hub-Signature-256');

        if ($package->webhook_secret && $signature) {
            $expectedSignature = 'sha256='.hash_hmac('sha256', $request->getContent(), $package->webhook_secret);

            if (! hash_equals($expectedSignature, $signature)) {
                return response()->json(['error' => 'Invalid signature'], 403);
            }
        }

        // Determine tenant ID for the build
        $tenantId = null;
        if (config('filament-satis.tenancy.enabled')) {
            $fk = config('filament-satis.tenancy.foreign_key');
            $tenantId = $package->{$fk} ?? null;
        }

        SyncTenantPackages::dispatch($tenantId);

        return response()->json(['status' => 'ok']);
    }
}
