<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\Pages;

use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\FilamentSatis\Resources\PackageReleases\PackageReleaseResource;

class ListPackageReleases extends ListRecords
{
    protected static string $resource = PackageReleaseResource::class;
}
