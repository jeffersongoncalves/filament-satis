<?php

namespace JeffersonGoncalves\FilamentSatis\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class PackageRelease extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getTable(): string
    {
        return config('filament-satis.table_prefix', 'satis_').'package_releases';
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ModelResolver::package());
    }

    public function dependencies(): BelongsToMany
    {
        return $this->belongsToMany(
            ModelResolver::dependency(),
            config('filament-satis.table_prefix', 'satis_').'dependency_package_release',
            'package_release_id',
            'dependency_id'
        )->withPivot('version', 'package_id')->withTimestamps();
    }
}
