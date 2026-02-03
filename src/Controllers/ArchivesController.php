<?php

namespace JeffersonGoncalves\FilamentSatis\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class ArchivesController extends Controller
{
    public function show(Request $request, string $vendor, string $package, string $file): BinaryFileResponse|Response
    {
        $token = $request->attributes->get('satis_token');

        if (! $token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Verify the token has access to this package
        $packageName = $vendor.'/'.$package;
        $hasAccess = $token->packages()->where('name', $packageName)->exists();

        if (! $hasAccess) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $disk = Storage::disk(config('filament-satis.storage_disk'));
        $storagePath = config('filament-satis.storage_path', 'satis');

        $tenantPrefix = $this->getTenantPrefix($request, $token);
        $buildPath = $storagePath.'/'.$tenantPrefix.$token->id;
        $archivePath = $buildPath.'/archives/'.$vendor.'/'.$package.'/'.$file;

        if (! $disk->exists($archivePath)) {
            return response()->json(['error' => 'Archive not found'], 404);
        }

        return response()->file($disk->path($archivePath));
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
