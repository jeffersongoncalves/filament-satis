<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Packages\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\FilamentSatis\Resources\Packages\PackageResource;
use JeffersonGoncalves\LaravelSatis\Actions\ValidatePackageCredentials;
use JeffersonGoncalves\LaravelSatis\Jobs\SyncTenantPackages;
use JeffersonGoncalves\LaravelSatis\Models\Package;

class EditPackage extends EditRecord
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('validateCredentials')
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

                    $this->refreshFormData(['is_credentials_validated', 'credentials_validated_at']);
                }),
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        if (config('satis.tenancy.enabled')) {
            $tenantId = config('satis.tenancy.resolver') ? call_user_func(config('satis.tenancy.resolver')) : null;
            SyncTenantPackages::dispatch($tenantId)->delay(now()->addSeconds(5));
        }
    }
}
