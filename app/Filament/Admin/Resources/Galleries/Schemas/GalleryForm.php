<?php

namespace App\Filament\Admin\Resources\Galleries\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('field_id')
                    ->label('المجال')
                    ->relationship('field', 'name_ar')
                    ->required()
                    ->searchable()
                    ->preload(),
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
                    ->maxSize(2048)
                    ->preserveFilenames() // ← هذا السطر مهم
                    ->visibility('public') // ← وهذا أيضاً
                    ->helperText('الصيغ المسموحة: JPG, PNG, GIF'),
                TextInput::make('order')
                    ->label('الترتيب')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
