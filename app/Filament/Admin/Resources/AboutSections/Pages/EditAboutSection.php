<?php

namespace App\Filament\Admin\Resources\AboutSections\Pages;

use App\Filament\Admin\Resources\AboutSections\AboutSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAboutSection extends EditRecord
{
    protected static string $resource = AboutSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
