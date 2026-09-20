<?php

namespace App\Filament\Admin\Resources\HeroSections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage; 

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('main_title_ar')
                    ->label('العنوان الرئيسي (عربي)')
                    ->required(),
                    
                TextInput::make('highlighted_text_ar')
                    ->label('النص المميز (عربي)')
                    ->required(),
                    
                Textarea::make('subtitle_ar')
                    ->label('النص الفرعي (عربي)')
                    ->required()
                    ->columnSpanFull(),
                    
                TextInput::make('main_title_en')
                    ->label('العنوان الرئيسي (إنجليزي)')
                    ->required(),
                    
                TextInput::make('highlighted_text_en')
                    ->label('النص المميز (إنجليزي)')
                    ->required(),
                    
                Textarea::make('subtitle_en')
                    ->label('النص الفرعي (إنجليزي)')
                    ->required()
                    ->columnSpanFull(),
                    
                FileUpload::make('image1_url')
                    ->label('الصورة الأولى')
                    ->directory('hero-images')
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('200')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->fetchFileInformation(false)
                    ->openable()
                    ->downloadable()
                    ->deletable(true)
                    ->required(),
                    
                FileUpload::make('image2_url')
                    ->label('الصورة الثانية')
                    ->directory('hero-images')
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('200')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->fetchFileInformation(false)
                    ->openable()
                    ->downloadable()
                    ->deletable(true)
                    ->required(),
            ]);
    }
}
