<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\CredentialResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\FilamentSatis\Resources\CredentialResource;

class ListCredentials extends ListRecords
{
    protected static string $resource = CredentialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
