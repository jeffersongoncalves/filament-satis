<?php

use BackedEnum;

if (! function_exists('enum_equals')) {
    /**
     * Check if a value equals a given BackedEnum (or any in an array of BackedEnums).
     *
     * @param  BackedEnum|array<BackedEnum>  $enum
     */
    function enum_equals(BackedEnum|string|int|null $value, BackedEnum|array $enum): bool
    {
        if (is_array($enum)) {
            return array_reduce($enum, fn (bool $carry, BackedEnum $item) => $carry || enum_equals($value, $item), false);
        }

        if (! $value instanceof BackedEnum) {
            return $enum::tryFrom($value) === $enum;
        }

        return $enum === $value;
    }
}
