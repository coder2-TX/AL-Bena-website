<?php

namespace App\Filament\Admin\Resources\Galleries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('field.name_ar')
                    ->label('المجال')
                    ->sortable()
                    ->searchable(),
                
                ImageColumn::make('image')
                    ->label('الصورة')
                    ->disk('public')
                    ->state(function ($record) {
                        return $record->image; 
                    })
                    ->width(80)
                    ->height(80)
                    ->checkFileExistence(), 
                
                TextColumn::make('name_ar')
                    ->label('الاسم العربي')
                    ->searchable(),
                
                TextColumn::make('name_en')
                    ->label('الاسم الإنجليزي')
                    ->searchable(),
                
                TextColumn::make('order')
                    ->label('الترتيب')
                    ->sortable(),
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
