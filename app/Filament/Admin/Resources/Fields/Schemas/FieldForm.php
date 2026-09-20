<?php

namespace App\Filament\Admin\Resources\Fields\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class FieldForm
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
                    
                FileUpload::make('icon_image')
                    ->label('صورة الأيقونة')
                    ->directory('fields-icons')
                    ->disk('public')
                    ->image()
                    ->required()
                    ->helperText('رفع صورة الأيقونة (PNG, SVG, JPG)'),
                    
                TextInput::make('name_ar')
                    ->label('الاسم بالعربي')
                    ->required(),
                    
                TextInput::make('name_en')
                    ->label('الاسم بالإنجليزي')
                    ->required(),
            ]);
    }
}