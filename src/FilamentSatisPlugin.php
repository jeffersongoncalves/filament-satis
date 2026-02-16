<?php

namespace JeffersonGoncalves\FilamentSatis;

use Filament\Contracts\Plugin;
use Filament\Panel;
use JeffersonGoncalves\FilamentSatis\Resources\DependencyResource;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloadResource;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleaseResource;
use JeffersonGoncalves\FilamentSatis\Resources\PackageResource;
use JeffersonGoncalves\FilamentSatis\Resources\TokenResource;

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
                'laravel-satis.tenancy.enabled' => true,
                'laravel-satis.tenancy.model' => $this->tenantModel,
                'laravel-satis.tenancy.foreign_key' => $this->tenantForeignKey,
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
            config(['laravel-satis.tenancy.resolver' => function () {
                return filament()->getTenant()?->getKey();
            }]);
        }
    }
}
