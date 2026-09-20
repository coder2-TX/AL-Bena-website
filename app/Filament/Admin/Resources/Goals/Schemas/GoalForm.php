<?php

namespace App\Filament\Admin\Resources\Goals\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class GoalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order')
                    ->label('الترتيب')
                    ->required()
                    ->numeric()
                    ->default(0),
                    
                Textarea::make('goal_ar')
                    ->label('الهدف بالعربي')
                    ->required()
                    ->columnSpanFull(),
                    
                Textarea::make('goal_en')
                    ->label('الهدف بالإنجليزي')
                    ->required()
                    ->columnSpanFull(),
                    
                FileUpload::make('image_url')
                    ->label('صورة قسم الأهداف')
                    ->directory('goals-images')
                    ->disk('public')
                    ->image()
            ]);
    }
}
