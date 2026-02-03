<?php

namespace JeffersonGoncalves\FilamentSatis\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use JeffersonGoncalves\FilamentSatis\Enums\PackageType;
use JeffersonGoncalves\FilamentSatis\Models\Package;

class ValidatePackageCredentials
{
    public function execute(Package $package): bool
    {
        $isValid = match ($package->type) {
            PackageType::Composer => $this->validateComposer($package),
            PackageType::Github => $this->validateGithub($package),
            default => false,
        };

        $package->update([
            'is_credentials_validated' => $isValid,
            'credentials_validated_at' => $isValid ? now() : null,
        ]);

        return $isValid;
    }

    protected function validateComposer(Package $package): bool
    {
        try {
            $response = Http::withBasicAuth(
                $package->username ?? '',
                $package->password ?? ''
            )->get($package->url.'/packages.json');

            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }

    protected function validateGithub(Package $package): bool
    {
        try {
            $url = $package->url;

            if ($package->username && $package->password) {
                $parsed = parse_url($url);
                $url = ($parsed['scheme'] ?? 'https').'://'
                    .$package->username.':'.$package->password.'@'
                    .($parsed['host'] ?? '')
                    .($parsed['path'] ?? '');
            }

            $result = Process::timeout(30)->run(['git', 'ls-remote', $url]);

            return $result->successful();
        } catch (\Exception $e) {
            return false;
        }
    }
}
