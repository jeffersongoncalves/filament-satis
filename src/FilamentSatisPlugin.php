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

    protected ?string $navigationGroup = null;

    protected ?int $navigationSort = null;

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

    public function navigationGroup(?string $group): static
    {
        $this->navigationGroup = $group;

        return $this;
    }

    public function navigationSort(?int $sort): static
    {
        $this->navigationSort = $sort;

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

    public function getNavigationGroup(): string
    {
        return $this->navigationGroup ?? config('filament-satis.navigation.group', 'Satis');
    }

    public function getNavigationSort(): int
    {
        return $this->navigationSort ?? config('filament-satis.navigation.sort', 50);
    }

    public function register(Panel $panel): void
    {
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
        //
    }
}
