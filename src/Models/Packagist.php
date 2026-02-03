<?php

namespace JeffersonGoncalves\FilamentSatis\Models;

use Illuminate\Database\Eloquent\Model;
use JeffersonGoncalves\FilamentSatis\Enums\DependencyType;

class Packagist extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'type' => DependencyType::class,
    ];

    public function getTable(): string
    {
        return config('filament-satis.table_prefix', 'satis_').'packagists';
    }
}
