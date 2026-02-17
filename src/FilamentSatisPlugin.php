<?php

namespace JeffersonGoncalves\FilamentSatis;

use Filament\Contracts\Plugin;
use Filament\Panel;
use JeffersonGoncalves\FilamentSatis\Resources\Dependencies\DependencyResource;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\PackageDownloadResource;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\PackageReleaseResource;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\PackageResource;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\TokenResource;

class FilamentSatisPlugin implements Plugin
{
    protected bool $multiTenancy = false;

    protected ?string $tenantModel = null;

    protected ?string $tenantForeignKey = null;

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static */
        return filament(app(static::class)->getId());
    }

    public function getId(): string
    {
        return 'filament-satis';
    }

    public function tenancy(
        bool $enabled = true,
        ?string $model = null,
        ?string $foreignKey = null
    ): static {
        $this->multiTenancy = $enabled;
        $this->tenantModel = $model;
        $this->tenantForeignKey = $foreignKey;

        return $this;
    }

    public function hasMultiTenancy(): bool
    {
        return $this->multiTenancy;
    }

    public function getTenantModel(): ?string
    {
        return $this->tenantModel;
    }

    public function getTenantForeignKey(): ?string
    {
        return $this->tenantForeignKey;
    }

    public function register(Panel $panel): void
    {
        if ($this->multiTenancy) {
            config([
                'satis.tenancy.enabled' => true,
                'satis.tenancy.model' => $this->tenantModel,
                'satis.tenancy.foreign_key' => $this->tenantForeignKey,
            ]);
        }

        $panel->resources([
            PackageResource::class,
            TokenResource::class,
            PackageReleaseResource::class,
            PackageDownloadResource::class,
            DependencyResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        if ($this->multiTenancy) {
            config(['satis.tenancy.resolver' => function () {
                return filament()->getTenant()?->getKey();
            }]);
        }
    }
}
