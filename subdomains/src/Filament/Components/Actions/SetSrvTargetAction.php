<?php

namespace Boy132\Subdomains\Filament\Components\Actions;

use App\Models\Node;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Enums\IconSize;

class SetSrvTargetAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'set_srv_target';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(fn () => trans('subdomains::strings.set_srv_target'));

        $this->tooltip(fn () => trans('subdomains::strings.set_srv_target'));

        $this->icon('tabler-world-www');

        $this->iconButton();

        $this->iconSize(IconSize::ExtraLarge);

        $this->schema([
            TextInput::make('srv_target')
                ->label(fn () => trans('subdomains::strings.srv_target'))
                ->default(fn (Node $node) => $node->srv_target), // @phpstan-ignore property.notFound
        ]);

        $this->action(function (Node $node, array $data) {
            $node->forceFill([
                'srv_target' => $data['srv_target'],
            ])->save();

            Notification::make()
                ->title(trans('subdomains::notifications.srv_target_updated'))
                ->success()
                ->send();
        });
    }
}
