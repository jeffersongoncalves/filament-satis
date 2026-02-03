<?php

namespace JeffersonGoncalves\FilamentSatis\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class PackagesController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $token = $request->attributes->get('satis_token');

        if (! $token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $disk = Storage::disk(config('filament-satis.storage_disk'));
        $storagePath = config('filament-satis.storage_path', 'satis');

        $tenantPrefix = $this->getTenantPrefix($token);
        $buildPath = $storagePath.'/'.$tenantPrefix.$token->id;
        $packagesJson = $buildPath.'/packages.json';

        if (! $disk->exists($packagesJson)) {
            return response()->json([
                'packages' => [],
                'notify-batch' => url(config('filament-satis.routes.api_prefix', 'api/satis').'/composer/downloads'),
            ]);
        }

        $content = json_decode($disk->get($packagesJson), true);
        $content['notify-batch'] = url(config('filament-satis.routes.api_prefix', 'api/satis').'/composer/downloads');

        return response()->json($content);
    }

    protected function getTenantPrefix($token): string
    {
        if (! config('filament-satis.tenancy.enabled')) {
            return '';
        }

        $fk = config('filament-satis.tenancy.foreign_key');
        $tenantId = $token->{$fk} ?? null;

        return $tenantId ? $tenantId.'/' : '';
    }
}
