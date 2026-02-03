<?php

namespace JeffersonGoncalves\FilamentSatis\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum DependencyType: string implements HasColor, HasIcon, HasLabel
{
    case Public = 'public';
    case Private = 'private';

    public function getLabel(): string
    {
        return match ($this) {
            self::Public => __('filament-satis::dependency.type.public'),
            self::Private => __('filament-satis::dependency.type.private'),
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Public => 'heroicon-o-globe-alt',
            self::Private => 'heroicon-o-lock-closed',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Public => 'success',
            self::Private => 'warning',
        };
    }
}
