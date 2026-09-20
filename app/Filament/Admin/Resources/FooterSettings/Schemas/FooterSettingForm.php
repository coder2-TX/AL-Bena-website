<?php

namespace App\Filament\Admin\Resources\FooterSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FooterSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // النصوص العربية
                TextInput::make('main_text_ar')
                    ->label('النص الرئيسي (عربي)')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('sub_text_ar')
                    ->label('النص الفرعي (عربي)')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('phone_ar')
                    ->label('رقم الهاتف (عربي)')
                    ->required()
                    ->tel()
                    ->maxLength(20),
                
                TextInput::make('email_ar')
                    ->label('البريد الإلكتروني (عربي)')
                    ->required()
                    ->email()
                    ->maxLength(255),
                
                Textarea::make('location_ar')
                    ->label('الموقع (عربي)')
                    ->required()
                    ->rows(3)
                    ->maxLength(500),
                
                TextInput::make('social_title_ar')
                    ->label('عنوان وسائل التواصل (عربي)')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('copyright_ar')
                    ->label('نص حقوق النشر (عربي)')
                    ->required()
                    ->rows(2)
                    ->maxLength(500),
                
                // النصوص الإنجليزية
                TextInput::make('main_text_en')
                    ->label('النص الرئيسي (إنجليزي)')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('sub_text_en')
                    ->label('النص الفرعي (إنجليزي)')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('phone_en')
                    ->label('رقم الهاتف (إنجليزي)')
                    ->required()
                    ->tel()
                    ->maxLength(20),
                
                TextInput::make('email_en')
                    ->label('البريد الإلكتروني (إنجليزي)')
                    ->required()
                    ->email()
                    ->maxLength(255),
                
                Textarea::make('location_en')
                    ->label('الموقع (إنجليزي)')
                    ->required()
                    ->rows(3)
                    ->maxLength(500),
                
                TextInput::make('social_title_en')
                    ->label('عنوان وسائل التواصل (إنجليزي)')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('copyright_en')
                    ->label('نص حقوق النشر (إنجليزي)')
                    ->required()
                    ->rows(2)
                    ->maxLength(500),
                
                // روابط التواصل الاجتماعي
                TextInput::make('whatsapp_url')
                    ->label('رابط واتساب')
                    ->url()
                    ->placeholder('https://wa.me/967XXXXXXXXX')
                    ->maxLength(255),
                
                TextInput::make('facebook_url')
                    ->label('رابط فيسبوك')
                    ->url()
                    ->placeholder('https://facebook.com/username')
                    ->maxLength(255),
                
                TextInput::make('twitter_url')
                    ->label('رابط تويتر')
                    ->url()
                    ->placeholder('https://twitter.com/username')
                    ->maxLength(255),
            ]);
    }
}