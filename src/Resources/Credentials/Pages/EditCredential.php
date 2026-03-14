<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Credentials\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\FilamentSatis\Resources\Credentials\CredentialResource;
use JeffersonGoncalves\LaravelSatis\Actions\ValidateCredential;
use JeffersonGoncalves\LaravelSatis\Models\Credential;

class EditCredential extends EditRecord
{
    protected static string $resource = CredentialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('validateCredential')
                ->label(__('filament-satis::credential.actions.validate.label'))
                ->icon('heroicon-o-check-badge')
                ->requiresConfirmation()
                ->visible(fn () => ! $this->getRecord()->getAttribute('is_validated'))
                ->action(function () {
                    /** @var Credential $record */
                    $record = $this->record;
                    $result = app(ValidateCredential::class)->execute($record);

                    if ($result['success']) {
                        $record->update([
                            'is_validated' => true,
                            'validated_at' => now(),
                        ]);

                        Notification::make()
                            ->title(__('filament-satis::credential.actions.validate.success'))
                            ->success()
                            ->send();
                    } else {
                        Notification::make()
                            ->title(__('filament-satis::credential.actions.validate.failed'))
                            ->body($result['message'])
                            ->danger()
                            ->send();
                    }

                    $this->refreshFormData(['is_validated', 'validated_at']);
                }),
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
