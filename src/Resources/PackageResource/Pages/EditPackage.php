<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\PackageResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\FilamentSatis\Resources\PackageResource;
use JeffersonGoncalves\LaravelSatis\Actions\ValidatePackageCredentials;
use JeffersonGoncalves\LaravelSatis\Jobs\SyncTenantPackages;
use JeffersonGoncalves\LaravelSatis\Models\Package;

class EditPackage extends EditRecord
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('validateCredentials')
                ->label(__('filament-satis::package.actions.validate_credentials'))
                ->icon('heroicon-o-check-badge')
                ->requiresConfirmation()
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
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
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
