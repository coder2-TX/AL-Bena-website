<?php

namespace App\Filament\Admin\Resources\FooterSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FooterSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('main_text_ar')
                    ->label('النص الرئيسي (عربي)')
                    ->searchable(),
                    
                TextColumn::make('sub_text_ar')
                    ->label('النص الفرعي (عربي)')
                    ->searchable(),
                    
                TextColumn::make('phone_ar')
                    ->label('رقم الهاتف (عربي)')
                    ->searchable(),
                    
                TextColumn::make('email_ar')
                    ->label('البريد الإلكتروني (عربي)')
                    ->searchable(),
                    
                TextColumn::make('social_title_ar')
                    ->label('عنوان وسائل التواصل (عربي)')
                    ->searchable(),
                    
                TextColumn::make('copyright_ar')
                    ->label('نص حقوق النشر (عربي)')
                    ->searchable(),
                    
                TextColumn::make('main_text_en')
                    ->label('النص الرئيسي (إنجليزي)')
                    ->searchable(),
                    
                TextColumn::make('sub_text_en')
                    ->label('النص الفرعي (إنجليزي)')
                    ->searchable(),
                    
                TextColumn::make('phone_en')
                    ->label('رقم الهاتف (إنجليزي)')
                    ->searchable(),
                    
                TextColumn::make('email_en')
                    ->label('البريد الإلكتروني (إنجليزي)')
                    ->searchable(),
                    
                TextColumn::make('social_title_en')
                    ->label('عنوان وسائل التواصل (إنجليزي)')
                    ->searchable(),
                    
                TextColumn::make('copyright_en')
                    ->label('نص حقوق النشر (إنجليزي)')
                    ->searchable(),
                    
                TextColumn::make('whatsapp_url')
                    ->label('رابط واتساب')
                    ->searchable(),
                    
                TextColumn::make('facebook_url')
                    ->label('رابط فيسبوك')
                    ->searchable(),
                    
                TextColumn::make('twitter_url')
                    ->label('رابط تويتر')
                    ->searchable(),
                    
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                TextColumn::make('updated_at')
                    ->label('تاريخ التحديث')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
