<?php

namespace App\Filament\Admin\Resources\VisionMissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VisionMissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vision_ar')
                    ->searchable()
                    ->label('الرؤية (عربي)')
                    ->limit(20),
                TextColumn::make('vision_en')
                    ->searchable()
                    ->label('الرؤية (إنجليزي)')
                    ->limit(20),
                TextColumn::make('mission_ar')
                    ->searchable()
                    ->label('الرسالة (عربي)')
                    ->limit(20),
                TextColumn::make('mission_en')
                    ->searchable()
                    ->label('الرسالة (إنجليزي)')
                    ->limit(20),
                TextColumn::make('values_ar')
                    ->searchable()
                    ->label('القيم (عربي)')
                    ->limit(20),
                TextColumn::make('values_en')
                    ->searchable()
                    ->label('القيم (إنجليزي)')
                    ->limit(20),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ الإنشاء'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ التحديث'),
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
