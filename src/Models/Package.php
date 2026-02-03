<?php

namespace JeffersonGoncalves\FilamentSatis\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JeffersonGoncalves\FilamentSatis\Concerns\GenerateCode;
use JeffersonGoncalves\FilamentSatis\Concerns\HasTenancy;
use JeffersonGoncalves\FilamentSatis\Enums\PackageType;
use JeffersonGoncalves\FilamentSatis\Support\ModelResolver;

class Package extends Model
{
    use GenerateCode;
    use HasFactory;
    use HasTenancy;

    protected $guarded = ['id'];

    protected $casts = [
        'type' => PackageType::class,
        'is_credentials_validated' => 'boolean',
        'credentials_validated_at' => 'datetime',
    ];

    protected $hidden = [
        'password',
        'username',
        'webhook_secret',
    ];

    public function getTable(): string
    {
        return config('filament-satis.table_prefix', 'satis_').'packages';
    }

    public function tokens(): BelongsToMany
    {
        $tokenModel = ModelResolver::token();

        return $this->belongsToMany(
            $tokenModel,
            config('filament-satis.table_prefix', 'satis_').'package_token',
            'package_id',
            'token_id'
        )->withTimestamps();
    }

    public function releases(): HasMany
    {
        return $this->hasMany(ModelResolver::packageRelease());
    }

    public function downloads(): HasMany
    {
        return $this->hasMany(ModelResolver::packageDownload());
    }
}
