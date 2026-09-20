<?php

namespace App\Filament\Admin\Resources\News\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->label('الترتيب')
                    ->sortable(),
                    
                TextColumn::make('title_ar')
                    ->label('العنوان العربي')
                    ->limit(30),
                    
                TextColumn::make('title_en')
                    ->label('العنوان الإنجليزي')
                    ->limit(30),
                    
                TextColumn::make('date')
                    ->label('التاريخ')
                    ->date('d/m/Y')
                    ->sortable(),
                    
                ImageColumn::make('images')
                    ->label('الصور')
                    ->disk('public')
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
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
