<?php

namespace App\Filament\Admin\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('الاسم')
                    ->required(),
                    
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required(),
                    
                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->required(),
                    
                TextInput::make('subject')
                    ->label('الموضوع')
                    ->required(),
                    
                Textarea::make('message')
                    ->label('الرسالة')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}