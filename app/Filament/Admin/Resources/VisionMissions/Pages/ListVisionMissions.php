<?php

namespace App\Filament\Admin\Resources\VisionMissions\Pages;

use App\Filament\Admin\Resources\VisionMissions\VisionMissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVisionMissions extends ListRecords
{
    protected static string $resource = VisionMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
