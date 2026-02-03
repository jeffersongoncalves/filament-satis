<?php

namespace JeffersonGoncalves\FilamentSatis\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class DependencyPackageRelease extends Pivot
{
    protected $guarded = ['id'];

    public $incrementing = true;

    public function getTable(): string
    {
        return config('filament-satis.table_prefix', 'satis_').'dependency_package_release';
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ModelResolver::package());
    }

    public function packageRelease(): BelongsTo
    {
        return $this->belongsTo(ModelResolver::packageRelease());
    }

    public function dependency(): BelongsTo
    {
        return $this->belongsTo(ModelResolver::dependency());
    }
}
