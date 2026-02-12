<?php

namespace Boy132\Tickets\Filament\Admin\Resources\Tickets\Pages;

use Boy132\Tickets\Filament\Admin\Resources\Tickets\TicketResource;
use Boy132\Tickets\Filament\Components\Actions\AnswerAction;
use Boy132\Tickets\Filament\Components\Actions\AssignToMeAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditTicket extends EditRecord
{
    protected static string $resource = TicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            AnswerAction::make(),
            AssignToMeAction::make(),
            Action::make('save')
                ->hiddenLabel()
                ->action('save')
                ->keyBindings(['mod+s'])
                ->tooltip(trans('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->icon('tabler-device-floppy'),
            $this->getCancelFormAction()->formId('form')
                ->tooltip(trans('filament-panels::auth/pages/edit-profile.actions.cancel.label'))
                ->hiddenLabel()
                ->icon('tabler-arrow-left'),
        ];
    }

    protected function getFormActions(): array
    {
        return [];
    }
}
