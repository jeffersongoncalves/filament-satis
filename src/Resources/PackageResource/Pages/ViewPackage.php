<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\FilamentSatis\Resources\PackageResource;

class ViewPackage extends ViewRecord
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
