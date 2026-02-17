<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Tokens\Pages;

use Filament\Resources\Pages\CreateRecord;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\TokenResource;
use JeffersonGoncalves\LaravelSatis\Jobs\SyncTokenPackages;
use JeffersonGoncalves\LaravelSatis\Models\Token;

class CreateToken extends CreateRecord
{
    protected static string $resource = TokenResource::class;

    protected function afterCreate(): void
    {
        /** @var Token $record */
        $record = $this->record;
        SyncTokenPackages::dispatch($record)->delay(now()->addSeconds(5));
    }
}
