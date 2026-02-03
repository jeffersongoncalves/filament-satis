<?php

namespace JeffersonGoncalves\FilamentSatis\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class IncludeController extends Controller
{
    public function show(Request $request, string $include): JsonResponse
    {
        $token = $request->attributes->get('satis_token');

        if (! $token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $disk = Storage::disk(config('filament-satis.storage_disk'));
        $storagePath = config('filament-satis.storage_path', 'satis');

        $tenantPrefix = $this->getTenantPrefix($token);
        $buildPath = $storagePath.'/'.$tenantPrefix.$token->id;
        $includeFile = $buildPath.'/include/'.$include.'.json';

        if (! $disk->exists($includeFile)) {
            return response()->json(['error' => 'Include file not found'], 404);
        }

        $content = json_decode($disk->get($includeFile), true);

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
