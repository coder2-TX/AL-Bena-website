<?php

namespace App\Filament\Admin\Resources\VisionMissions\Pages;

use App\Filament\Admin\Resources\VisionMissions\VisionMissionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVisionMission extends EditRecord
{
    protected static string $resource = VisionMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
