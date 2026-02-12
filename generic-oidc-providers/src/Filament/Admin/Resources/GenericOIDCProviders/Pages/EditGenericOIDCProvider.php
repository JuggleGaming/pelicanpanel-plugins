<?php

namespace Boy132\GenericOIDCProviders\Filament\Admin\Resources\GenericOIDCProviders\Pages;

use Boy132\GenericOIDCProviders\Filament\Admin\Resources\GenericOIDCProviders\GenericOIDCProviderResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGenericOIDCProvider extends EditRecord
{
    protected static string $resource = GenericOIDCProviderResource::class;

    protected function getFormActions(): array
    {
        return [];
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            Action::make('save')
                ->hiddenLabel()
                ->action('save')
                ->keyBindings(['mod+s'])
                ->tooltip(trans('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->icon('tabler-device-floppy'),
        ];
    }
}
