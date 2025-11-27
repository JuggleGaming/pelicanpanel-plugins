<?php

namespace Boy132\LegalPages\Enums;

use Boy132\LegalPages\Filament\App\Pages\Imprint;
use Boy132\LegalPages\Filament\App\Pages\TermsOfService;
use Exception;
use Filament\Support\Contracts\HasLabel;

enum LegalPageType: string implements HasLabel
{
    case Imprint = 'imprint';
    case TermsOfService = 'terms_of_service';

    /** @return class-string */
    public function getClass(): string
    {
        return match ($this->value) {
            'imprint' => Imprint::class,
            'terms_of_service' => TermsOfService::class,
            default => throw new Exception('Unknown legal page type'),
        };
    }

    public function getLabel(): string
    {
        return trans('legal-pages::strings.' . $this->value);
    }

    public function getUrl(): string
    {
        $name = str_replace('_', '', $this->value);

        return "/$name";
    }
}
