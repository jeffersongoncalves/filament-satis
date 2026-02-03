<?php

namespace JeffersonGoncalves\FilamentSatis\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use JeffersonGoncalves\FilamentSatis\Enums\DependencyType;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class Dependency extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'versions' => 'array',
        'type' => DependencyType::class,
    ];

    public function getTable(): string
    {
        return config('filament-satis.table_prefix', 'satis_').'dependencies';
    }

    public function packageReleases(): BelongsToMany
    {
        return $this->belongsToMany(
            ModelResolver::packageRelease(),
            config('filament-satis.table_prefix', 'satis_').'dependency_package_release',
            'dependency_id',
            'package_release_id'
        )->withPivot('version', 'package_id')->withTimestamps();
    }
}
