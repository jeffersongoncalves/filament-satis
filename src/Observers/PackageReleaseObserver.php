<?php

namespace JeffersonGoncalves\FilamentSatis\Observers;

use JeffersonGoncalves\FilamentSatis\Models\PackageRelease;

class PackageReleaseObserver
{
    public function created(PackageRelease $release): void
    {
        //
    }

    public function deleted(PackageRelease $release): void
    {
        //
    }
}
