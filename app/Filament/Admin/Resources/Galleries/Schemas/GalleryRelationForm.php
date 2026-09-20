<?php

namespace App\Filament\Admin\Resources\Galleries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class GalleryRelationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_ar')
                    ->label('اسم الصورة (عربي)')
                    ->required()
                    ->maxLength(255),
                TextInput::make('name_en')
                    ->label('اسم الصورة (إنجليزي)')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')
                    ->label('الصورة')
                    ->directory('galleries')
                    ->disk('public')
                    ->image()
                    ->required()
                    ->maxSize(2048),
                TextInput::make('order')
                    ->label('الترتيب')
                    ->numeric()
                    ->default(0),
            ]);
    }
}