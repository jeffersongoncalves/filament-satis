<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Credentials\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\CredentialResource;

class ListCredentials extends ListRecords
{
    protected static string $resource = CredentialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
