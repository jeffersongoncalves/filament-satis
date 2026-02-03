<?php

namespace JeffersonGoncalves\FilamentSatis\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use JeffersonGoncalves\FilamentSatis\Concerns\GenerateCode;
use JeffersonGoncalves\FilamentSatis\Concerns\HasTenancy;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class Token extends Model
{
    use GenerateCode;
    use HasFactory;
    use HasTenancy;

    protected $guarded = ['id'];

    protected $hidden = [
        'token',
    ];

    public function getTable(): string
    {
        return config('filament-satis.table_prefix', 'satis_').'tokens';
    }

    public function packages(): BelongsToMany
    {
        $packageModel = ModelResolver::package();

        return $this->belongsToMany(
            $packageModel,
            config('filament-satis.table_prefix', 'satis_').'package_token',
            'token_id',
            'package_id'
        )->withTimestamps();
    }

    public function getAuthIdentifierName(): string
    {
        return 'token';
    }

    public function getAuthIdentifier(): string
    {
        return $this->token;
    }

    public function getAuthPassword(): string
    {
        return $this->token;
    }
}
