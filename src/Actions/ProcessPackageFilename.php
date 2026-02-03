<?php

namespace JeffersonGoncalves\FilamentSatis\Actions;

class ProcessPackageFilename
{
    public function execute(string $filename): array
    {
        // Extract vendor/package from filename
        // Format: vendor-package-version-hash.zip or vendor/package
        $parts = explode('/', $filename);

        if (count($parts) >= 2) {
            return [
                'vendor' => $parts[0],
                'package' => $parts[1],
                'full_name' => $parts[0].'/'.$parts[1],
            ];
        }

        // Try dash-separated format
        $parts = explode('-', $filename);

        if (count($parts) >= 2) {
            return [
                'vendor' => $parts[0],
                'package' => $parts[1],
                'full_name' => $parts[0].'/'.$parts[1],
            ];
        }

        return [
            'vendor' => null,
            'package' => $filename,
            'full_name' => $filename,
        ];
    }
}
