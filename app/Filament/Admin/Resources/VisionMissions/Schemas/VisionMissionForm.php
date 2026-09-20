<?php

namespace App\Filament\Admin\Resources\VisionMissions\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VisionMissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('vision_ar')
                    ->required()
                    ->columnSpanFull()
                    ->label('الرؤية (العربي)'),
                Textarea::make('vision_en')
                    ->required()
                    ->columnSpanFull()
                    ->label('الرؤية (الإنجليزية)'),
                Textarea::make('mission_ar')
                    ->required()
                    ->columnSpanFull()
                    ->label('الرسالة (العربي)'),
                Textarea::make('mission_en')
                    ->required()
                    ->columnSpanFull()
                    ->label('الرسالة (الإنجليزية)'),
                Textarea::make('values_ar')
                    ->required()
                    ->columnSpanFull()
                    ->label('القيم (العربي)'),
                Textarea::make('values_en')
                    ->required()
                    ->columnSpanFull()
                    ->label('القيم (الإنجليزية)'),
            ]);
    }
}