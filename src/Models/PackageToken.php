<?php

namespace JeffersonGoncalves\FilamentSatis\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class PackageToken extends Pivot
{
    protected $guarded = ['id'];

    public $incrementing = true;

    public function getTable(): string
    {
        return config('filament-satis.table_prefix', 'satis_').'package_token';
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ModelResolver::package());
    }

    public function token(): BelongsTo
    {
        return $this->belongsTo(ModelResolver::token());
    }
}
