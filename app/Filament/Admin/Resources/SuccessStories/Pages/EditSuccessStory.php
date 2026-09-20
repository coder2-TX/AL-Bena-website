<?php

namespace App\Filament\Admin\Resources\SuccessStories\Pages;

use App\Filament\Admin\Resources\SuccessStories\SuccessStoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSuccessStory extends EditRecord
{
    protected static string $resource = SuccessStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
