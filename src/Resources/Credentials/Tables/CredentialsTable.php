<?php

namespace JeffersonGoncalves\FilamentSatis\Resources\Credentials\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use JeffersonGoncalves\LaravelSatis\Actions\ValidateCredential;
use JeffersonGoncalves\LaravelSatis\Models\Credential;

class CredentialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-satis::credential.table.name'))
                    ->searchable()
                    ->sortable(),

                IconColumn::make('is_validated')
                    ->label(__('filament-satis::credential.table.is_validated'))
                    ->boolean()
                    ->sortable(),

                TextColumn::make('packages_count')
                    ->label(__('filament-satis::credential.table.packages_count'))
                    ->counts('packages')
                    ->sortable(),

                TextColumn::make('url')
                    ->label(__('filament-satis::credential.table.url'))
                    ->limit(50)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                Action::make('validateCredential')
                    ->label(__('filament-satis::credential.actions.validate.label'))
                    ->icon('heroicon-o-check-badge')
                    ->requiresConfirmation()
                    ->visible(fn (Credential $record) => ! $record->is_validated)
                    ->action(function (Credential $record) {
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
                    }),
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
