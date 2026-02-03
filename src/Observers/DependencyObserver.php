<?php

namespace JeffersonGoncalves\FilamentSatis\Observers;

use Illuminate\Support\Facades\Cache;
use JeffersonGoncalves\FilamentSatis\Enums\DependencyType;
use JeffersonGoncalves\FilamentSatis\Models\Dependency;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class DependencyObserver
{
    public function creating(Dependency $dependency): void
    {
        if (empty($dependency->type)) {
            $packagistModel = ModelResolver::packagist();
            $exists = $packagistModel::where('name', $dependency->name)->exists();
            $dependency->type = $exists ? DependencyType::Public : DependencyType::Private;
        }
    }

    public function created(Dependency $dependency): void
    {
        $this->clearCache();
    }

    public function deleted(Dependency $dependency): void
    {
        $this->clearCache();
    }

    protected function clearCache(): void
    {
        Cache::forget('filament-satis:dependencies');
        Cache::forget('filament-satis:dependencies-count');
    }
}
