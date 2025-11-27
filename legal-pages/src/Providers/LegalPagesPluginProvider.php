<?php

namespace Boy132\LegalPages\Providers;

use Boy132\LegalPages\Enums\LegalPageType;
use Boy132\LegalPages\LegalPagesPlugin;
use Filament\Support\Facades\FilamentView;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

class LegalPagesPluginProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            foreach (LegalPageType::cases() as $legalPageType) {
                Route::get($legalPageType->value, $legalPageType->getClass())->name($legalPageType->value)->withoutMiddleware(['auth']);
            }
        });

        $footer = null;

        foreach (LegalPageType::cases() as $legalPageType) {
            $content = LegalPagesPlugin::Load($legalPageType);

            if ($content) {
                $label = $legalPageType->getLabel();
                $url = $legalPageType->getUrl();

                if (!$footer) {
                    $footer = "<x-filament::link href=\"$url\" target='_blank'>$label</x-filament::link>";
                } else {
                    $footer = "$footer | <x-filament::link href=\"$url\" target='_blank'>$label</x-filament::link>";
                }
            }
        }

        if ($footer) {
            FilamentView::registerRenderHook('pelican::footer-end', fn () => Blade::render("<div>$footer</div>"));
        }
    }
}
