<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\TokenResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\FilamentSatis\Resources\TokenResource;

class ViewToken extends ViewRecord
{
    protected static string $resource = TokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
