<?php

namespace JeffersonGoncalves\FilamentSatis\Support;

use Illuminate\Support\Collection;
use JeffersonGoncalves\FilamentSatis\Enums\PackageType;
use JeffersonGoncalves\FilamentSatis\Models\Package;

class SatisConfig
{
    protected array $config;

    protected Collection $packages;

    protected ?string $homepage = null;

    public function __construct()
    {
        $this->config = config('filament-satis.satis', []);
        $this->packages = collect();
    }

    public static function make(): static
    {
        return new static;
    }

    public function setPackages(Collection $packages): static
    {
        $this->packages = $packages;

        return $this;
    }

    public function setHomepage(string $homepage): static
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function toArray(): array
    {
        $config = $this->config;
        $config['homepage'] = $this->homepage ?? url('/');
        $config['repositories'] = $this->buildRepositories();
        $config['require'] = $this->buildRequires();

        return $config;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    protected function buildRepositories(): array
    {
        return $this->packages->map(function (Package $package) {
            $repo = [
                'type' => $this->resolveRepositoryType($package),
                'url' => $package->url,
            ];

            if ($package->username && $package->password) {
                $repo['options'] = [
                    'http' => [
                        'header' => [
                            'Authorization: Basic '.base64_encode($package->username.':'.$package->password),
                        ],
                    ],
                ];
            }

            return $repo;
        })->values()->toArray();
    }

    protected function buildRequires(): array
    {
        return $this->packages->mapWithKeys(function (Package $package) {
            return [$package->name => '*'];
        })->toArray();
    }

    protected function resolveRepositoryType(Package $package): string
    {
        return match ($package->type) {
            PackageType::Github => 'vcs',
            default => 'composer',
        };
    }
}
