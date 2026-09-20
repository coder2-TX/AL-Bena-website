<?php

namespace App\Filament\Admin\Resources\Reports\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReportsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('year')
                    ->numeric()
                    ->sortable()
                    ->label('السنة'),
                TextColumn::make('annual_pdf_path')
                    ->searchable()
                    ->label('مسار التقرير السنوي (PDF)'),
                TextColumn::make('annual_excel_path')
                    ->searchable()
                    ->label('مسار التقرير السنوي (Excel)'),
                TextColumn::make('half_year_pdf_path')
                    ->searchable()
                    ->label('مسار التقرير النصفي (PDF)'),
                TextColumn::make('half_year_excel_path')
                    ->searchable()
                    ->label('مسار التقرير النصفي (Excel)'),
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
