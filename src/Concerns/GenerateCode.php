<?php

namespace JeffersonGoncalves\FilamentSatis\Concerns;

use Illuminate\Support\Str;

trait GenerateCode
{
    public static function generateUniqueCode(int $length = 32): string
    {
        return Str::random($length);
    }

    public static function generateToken(): string
    {
        return static::generateUniqueCode(64);
    }

    public static function generateWebhookSecret(): string
    {
        return static::generateUniqueCode(40);
    }

    public static function generateReference(): string
    {
        return static::generateUniqueCode(20);
    }
}
