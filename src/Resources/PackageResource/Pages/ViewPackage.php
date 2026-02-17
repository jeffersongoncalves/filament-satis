<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\FilamentSatis\Resources\PackageResource;
use JeffersonGoncalves\LaravelSatis\Actions\ValidatePackageCredentials;
use JeffersonGoncalves\LaravelSatis\Models\Package;

class ViewPackage extends ViewRecord
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('validateCredentials')
                ->label(__('filament-satis::package.actions.validate_credentials'))
                ->icon('heroicon-o-check-badge')
                ->requiresConfirmation()
                ->visible(fn () => ! $this->getRecord()->getAttribute('is_credentials_validated'))
                ->action(function () {
                    /** @var Package $record */
                    $record = $this->record;
                    $result = app(ValidatePackageCredentials::class)->execute($record);

                    if ($result) {
                        Notification::make()
                            ->title(__('filament-satis::package.notifications.credentials_valid'))
                            ->success()
                            ->send();
                    } else {
                        Notification::make()
                            ->title(__('filament-satis::package.notifications.credentials_invalid'))
                            ->danger()
                            ->send();
                    }
                }),
            Actions\EditAction::make(),
        ];
    }

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }
}
