<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('الاسم'),
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')
                    ->label('تاريخ التحقق من البريد الإلكتروني'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->label('كلمة المرور'),
            ]);
    }
}
