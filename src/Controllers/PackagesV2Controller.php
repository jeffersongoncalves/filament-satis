<?php

namespace JeffersonGoncalves\FilamentSatis\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class PackagesV2Controller extends Controller
{
    public function show(Request $request, string $vendor, string $package): JsonResponse
    {
        $token = $request->attributes->get('satis_token');

        if (! $token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $disk = Storage::disk(config('filament-satis.storage_disk'));
        $storagePath = config('filament-satis.storage_path', 'satis');

        $tenantPrefix = $this->getTenantPrefix($request, $token);
        $buildPath = $storagePath.'/'.$tenantPrefix.$token->id;
        $packageFile = $buildPath.'/p2/'.$vendor.'/'.$package.'.json';

        if (! $disk->exists($packageFile)) {
            return response()->json(['error' => 'Package not found'], 404);
        }

        $content = json_decode($disk->get($packageFile), true);

        return response()->json($content);
    }

    protected function getTenantPrefix(Request $request, $token): string
    {
        if (! config('filament-satis.tenancy.enabled')) {
            return '';
        }

        $tenantId = $request->route('tenant');

        if ($tenantId) {
            return $tenantId.'/';
        }

        $fk = config('filament-satis.tenancy.foreign_key');
        $tenantId = $token->{$fk} ?? null;

        return $tenantId ? $tenantId.'/' : '';
    }
}
