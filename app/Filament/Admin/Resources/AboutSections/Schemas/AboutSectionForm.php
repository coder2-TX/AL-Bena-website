<?php

namespace App\Filament\Admin\Resources\AboutSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AboutSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('description_ar')
                    ->label('الوصف باللغة العربية')
                    ->required()
                    ->columnSpanFull()
                    ->rows(5)
                    ->helperText('أدخل وصف قسم من نحن باللغة العربية'),
                
                Textarea::make('description_en')
                    ->label('الوصف باللغة الإنجليزية')
                    ->required()
                    ->columnSpanFull()
                    ->rows(5)
                    ->helperText('أدخل وصف قسم من نحن باللغة الإنجليزية'),
                
                FileUpload::make('image_url')
                    ->label('صورة القسم')
                    ->disk('public')
                    ->image()
                    ->required()
                    ->directory('about-sections')
                    ->maxSize(2048)
                    ->helperText('الصيغ المسموحة: JPG, PNG - الحد الأقصى 2MB')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9'),
            ]);
    }
}