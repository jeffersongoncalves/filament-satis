<?php

namespace JeffersonGoncalves\FilamentSatis\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PackageType: string implements HasIcon, HasLabel
{
    case Composer = 'composer';
    case Github = 'github';

    public function getLabel(): string
    {
        return match ($this) {
            self::Composer => __('filament-satis::package.type.composer'),
            self::Github => __('filament-satis::package.type.github'),
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Composer => 'heroicon-o-cube',
            self::Github => 'heroicon-o-code-bracket',
        };
    }
}
