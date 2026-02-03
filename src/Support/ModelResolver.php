<?php

namespace JeffersonGoncalves\FilamentSatis\Support;

class ModelResolver
{
    public static function package(): string
    {
        return config('filament-satis.models.package');
    }

    public static function token(): string
    {
        return config('filament-satis.models.token');
    }

    public static function dependency(): string
    {
        return config('filament-satis.models.dependency');
    }

    public static function packageRelease(): string
    {
        return config('filament-satis.models.package_release');
    }

    public static function packageDownload(): string
    {
        return config('filament-satis.models.package_download');
    }

    public static function packagist(): string
    {
        return config('filament-satis.models.packagist');
    }
}
