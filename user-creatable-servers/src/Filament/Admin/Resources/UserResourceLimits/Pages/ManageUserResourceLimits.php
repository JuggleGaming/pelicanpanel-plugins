<?php

namespace Boy132\UserCreatableServers\Filament\Admin\Resources\UserResourceLimits\Pages;

use Boy132\UserCreatableServers\Filament\Admin\Resources\UserResourceLimits\UserResourceLimitsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageUserResourceLimits extends ManageRecords
{
    protected static string $resource = UserResourceLimitsResource::class;

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
