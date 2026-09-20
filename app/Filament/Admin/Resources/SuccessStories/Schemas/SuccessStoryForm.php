<?php

namespace App\Filament\Admin\Resources\SuccessStories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SuccessStoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title_ar')
                    ->required()
                    ->label('العنوان (العربي)'),
                Textarea::make('content_ar')
                    ->required()
                    ->columnSpanFull()
                    ->label('المحتوى (العربي)'),
                TextInput::make('title_en')
                    ->required()
                    ->label('العنوان (الإنجليزية)'),
                Textarea::make('content_en')
                    ->required()
                    ->columnSpanFull()
                    ->label('المحتوى (الإنجليزية)'),
            ]);
    }
}