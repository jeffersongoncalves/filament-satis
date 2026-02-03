<?php

namespace JeffersonGoncalves\FilamentSatis\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class PackageDownload extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'downloads' => 'integer',
    ];

    public function getTable(): string
    {
        return config('filament-satis.table_prefix', 'satis_').'package_downloads';
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ModelResolver::package());
    }
}
