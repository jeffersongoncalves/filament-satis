<?php

namespace JeffersonGoncalves\FilamentSatis\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasTenancy
{
    public static function bootHasTenancy(): void
    {
        if (! config('filament-satis.tenancy.enabled')) {
            return;
        }

        $foreignKey = config('filament-satis.tenancy.foreign_key');

        static::addGlobalScope('satis-tenant', function (Builder $query) use ($foreignKey) {
            if (function_exists('filament') && filament()->getTenant()) {
                $query->where($foreignKey, filament()->getTenant()->getKey());
            }
        });

        static::creating(function (Model $model) use ($foreignKey) {
            if (function_exists('filament') && filament()->getTenant()) {
                $model->{$foreignKey} = filament()->getTenant()->getKey();
            }
        });
    }

    public function tenant(): BelongsTo
    {
        $model = config('filament-satis.tenancy.model');
        $foreignKey = config('filament-satis.tenancy.foreign_key');

        return $this->belongsTo($model, $foreignKey);
    }
}
