<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\Pages;

use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\FilamentSatis\Resources\PackageDownloads\PackageDownloadResource;

class ListPackageDownloads extends ListRecords
{
    protected static string $resource = PackageDownloadResource::class;
}
