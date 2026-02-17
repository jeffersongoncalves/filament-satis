<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Tokens\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\FilamentSatis\Resources\Tokens\TokenResource;
use JeffersonGoncalves\LaravelSatis\Jobs\SyncTokenPackages;
use JeffersonGoncalves\LaravelSatis\Models\Token;

class EditToken extends EditRecord
{
    protected static string $resource = TokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        /** @var Token $record */
        $record = $this->record;
        SyncTokenPackages::dispatch($record)->delay(now()->addSeconds(5));
    }
}
