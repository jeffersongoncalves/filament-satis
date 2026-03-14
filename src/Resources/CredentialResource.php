<?php

namespace JeffersonGoncalves\FilamentSatis\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\FilamentSatis\Resources\CredentialResource\Pages;
use JeffersonGoncalves\LaravelSatis\Actions\ValidateCredential;
use JeffersonGoncalves\LaravelSatis\Support\ModelResolver;

class CredentialResource extends Resource
{
    public static function getModel(): string
    {
        return ModelResolver::credential();
    }

    public static function getNavigationIcon(): ?string
    {
        return config('filament-satis.credential_resource.navigation_icon', 'heroicon-o-shield-check');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-satis.credential_resource.navigation_sort', 2);
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-satis.navigation_group', 'Satis');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return config('filament-satis.credential_resource.should_register_navigation', true);
    }

    public static function getCluster(): ?string
    {
        return config('filament-satis.credential_resource.cluster');
    }

    public static function getSlug(): string
    {
        return config('filament-satis.credential_resource.slug', 'satis/credentials');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-satis::credential.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-satis::credential.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-satis::credential.plural_model_label');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(null)
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament-satis::credential.form.name'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('url')
                    ->label(__('filament-satis::credential.form.url'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label(__('filament-satis::credential.form.email'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('password')
                    ->label(__('filament-satis::credential.form.password'))
                    ->password()
                    ->revealable()
                    ->required(fn (string $context): bool => $context === 'create')
                    ->dehydrated(fn ($state) => filled($state)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-satis::credential.table.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_validated')
                    ->label(__('filament-satis::credential.table.is_validated'))
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('packages_count')
                    ->label(__('filament-satis::credential.table.packages_count'))
                    ->counts('packages')
                    ->sortable(),

                Tables\Columns\TextColumn::make('url')
                    ->label(__('filament-satis::credential.table.url'))
                    ->limit(50)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-satis::general.created_at'))
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\Action::make('validateCredential')
                    ->label(__('filament-satis::credential.actions.validate.label'))
                    ->icon('heroicon-o-check-badge')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => ! $record->is_validated)
                    ->action(function ($record) {
                        $result = app(ValidateCredential::class)->execute($record);

                        if ($result['success']) {
                            $record->update(['is_validated' => true, 'validated_at' => now()]);

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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(null)
            ->schema([
                Infolists\Components\Section::make(__('filament-satis::credential.sections.general'))
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label(__('filament-satis::credential.form.name'))
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('url')
                            ->label(__('filament-satis::credential.form.url'))
                            ->copyable()
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('email')
                            ->label(__('filament-satis::credential.form.email'))
                            ->columnSpanFull(),
                    ]),
                Infolists\Components\Section::make(__('filament-satis::credential.sections.validation'))
                    ->schema([
                        Infolists\Components\IconEntry::make('is_validated')
                            ->label(__('filament-satis::credential.table.is_validated'))
                            ->boolean()
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('validated_at')
                            ->label(__('filament-satis::credential.fields.validated_at'))
                            ->since()
                            ->columnSpanFull()
                            ->hidden(fn ($state) => blank($state)),
                    ]),
                Infolists\Components\Section::make(__('filament-satis::credential.sections.packages'))
                    ->schema([
                        Infolists\Components\TextEntry::make('packages_count')
                            ->label(__('filament-satis::credential.table.packages_count'))
                            ->state(fn ($record) => $record->packages()->count())
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCredentials::route('/'),
            'create' => Pages\CreateCredential::route('/create'),
            'view' => Pages\ViewCredential::route('/{record}'),
            'edit' => Pages\EditCredential::route('/{record}/edit'),
        ];
    }
}
