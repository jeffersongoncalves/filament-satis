<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Dependencies\Pages;

use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\FilamentSatis\Resources\Dependencies\DependencyResource;

class ViewDependency extends ViewRecord
{
    protected static string $resource = DependencyResource::class;

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }
}
