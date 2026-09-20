<?php

namespace App\Filament\Admin\Resources\News\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order')
                    ->label('ترتيب الخبر')
                    ->required()
                    ->numeric()
                    ->default(0),
                    
                TextInput::make('title_ar')
                    ->label('عنوان الخبر (عربي)')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('title_en')
                    ->label('عنوان الخبر (إنجليزي)')
                    ->required()
                    ->maxLength(255),
                    
                Textarea::make('content_ar')
                    ->label('محتوى الخبر (عربي)')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                    
                Textarea::make('content_en')
                    ->label('محتوى الخبر (إنجليزي)')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                    
                DatePicker::make('date')
                    ->label('تاريخ الخبر')
                    ->required()
                    ->default(now()),
                    
                FileUpload::make('images')
                    ->label('صور الخبر (يمكن رفع من 1 إلى 3 صور)')
                    ->directory('news-images')
                    ->disk('public')
                    ->image()
                    ->multiple()
                    ->minFiles(1)
                    ->maxFiles(3)
                    ->reorderable()
                    ->required()
                    ->helperText('يمكن رفع من 1 إلى 3 صور للخبر'),
            ]);
    }
}
