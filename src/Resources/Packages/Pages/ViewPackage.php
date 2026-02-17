<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\PackageResource;

class ViewPackage extends ViewRecord
{
    protected static string $resource = PackageResource::class;

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
