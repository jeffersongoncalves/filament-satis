<?php

namespace JeffersonGoncalves\FilamentSatis\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JeffersonGoncalves\FilamentSatis\Jobs\DownloadComposerJob;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class DownloadComposerController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $downloads = $request->input('downloads', []);

        if (empty($downloads)) {
            return response()->json(['status' => 'ok']);
        }

        $packageModel = ModelResolver::package();

        foreach ($downloads as $download) {
            $name = $download['name'] ?? null;
            $version = $download['version'] ?? null;

            if (! $name || ! $version) {
                continue;
            }

            $package = $packageModel::where('name', $name)->first();

            if ($package) {
                DownloadComposerJob::dispatch($package->id, $version);
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
