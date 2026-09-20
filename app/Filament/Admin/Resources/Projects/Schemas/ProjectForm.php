<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order')
                    ->label('ترتيب المشروع')
                    ->required()
                    ->numeric()
                    ->default(0),
                    
                TextInput::make('name_ar')
                    ->label('اسم المشروع (عربي)')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('name_en')
                    ->label('اسم المشروع (إنجليزي)')
                    ->required()
                    ->maxLength(255),
                    
                FileUpload::make('image_url')
                    ->label('صورة المشروع')
                    ->directory('projects-images')
                    ->disk('public')
                    ->image()
                    ->required()
                    ->helperText('رفع صورة المشروع (PNG, JPG, JPEG)'),
                    
                FileUpload::make('pdf_url')
                    ->label('ملف PDF للمشروع')
                    ->directory('projects-pdfs')
                    ->disk('public')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required()
                    ->helperText('رفع ملف PDF للمشروع'),
            ]);
    }
}
