<?php

namespace Boy132\Announcements\Filament\Admin\Resources\Announcements\Pages;

use Boy132\Announcements\Filament\Admin\Resources\Announcements\AnnouncementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageAnnouncements extends ManageRecords
{
    protected static string $resource = AnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->createAnother(false)
                ->hiddenLabel()
                ->icon('tabler-plus'),
        ];
    }
}
