<?php

namespace App\Filament\Admin\Resources\HeroSections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeroSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('main_title_ar')
                    ->label('العنوان الرئيسي (عربي)')
                    ->searchable(),
                    
                TextColumn::make('highlighted_text_ar')
                    ->label('النص المميز (عربي)')
                    ->searchable(),
                    
                TextColumn::make('main_title_en')
                    ->label('العنوان الرئيسي (إنجليزي)')
                    ->searchable(),
                    
                TextColumn::make('highlighted_text_en')
                    ->label('النص المميز (إنجليزي)')
                    ->searchable(),
                    
                TextColumn::make('image1_url')
                    ->label('الصورة الأولى')
                    ->searchable(),
                    
                TextColumn::make('image2_url')
                    ->label('الصورة الثانية')
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
                EditAction::make()
                    ->label('تعديل'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('حذف'),
                ]),
            ]);
    }
}