<?php

namespace App\Filament\Admin\Resources\Reports\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ReportForm
{
    public static function configure(Schema $schema): Schema
    {
        // توليد قائمة السنوات (من السنة الحالية إلى 20 سنة للخلف)
        $currentYear = (int) now()->year;
        $years = range($currentYear, $currentYear - 20);
        $yearOptions = array_combine($years, $years);

        return $schema
            ->components([
                // اختيار السنة
                Select::make('year')
                    ->label('السنة')
                    ->options($yearOptions)
                    ->required()
                    ->native(false)
                    ->searchable(),

                // التقرير السنوي (PDF)
                FileUpload::make('annual_pdf_path')
                    ->label('التقرير السنوي (PDF)')
                    ->disk('public')
                    ->directory('reports/annual')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(10240) // تقريباً 10MB
                    ->openable()
                    ->downloadable()
                    ->deletable(true)
                    ->nullable()
                    // واحد على الأقل من (annual_pdf_path أو annual_excel_path) مطلوب
                    ->rules(['nullable', 'required_without:annual_excel_path']),

                // التقرير السنوي (Excel)
                FileUpload::make('annual_excel_path')
                    ->label('التقرير السنوي (Excel)')
                    ->disk('public')
                    ->directory('reports/annual')
                    ->acceptedFileTypes([
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ])
                    ->maxSize(10240)
                    ->openable()
                    ->downloadable()
                    ->deletable(true)
                    ->nullable()
                    ->rules(['nullable', 'required_without:annual_pdf_path']),

                // تقرير نصف السنة (PDF)
                FileUpload::make('half_year_pdf_path')
                    ->label('تقرير نصف السنة (PDF)')
                    ->disk('public')
                    ->directory('reports/half-year')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(10240)
                    ->openable()
                    ->downloadable()
                    ->deletable(true)
                    ->nullable()
                    // واحد على الأقل من (half_year_pdf_path أو half_year_excel_path) مطلوب
                    ->rules(['nullable', 'required_without:half_year_excel_path']),

                // تقرير نصف السنة (Excel)
                FileUpload::make('half_year_excel_path')
                    ->label('تقرير نصف السنة (Excel)')
                    ->disk('public')
                    ->directory('reports/half-year')
                    ->acceptedFileTypes([
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ])
                    ->maxSize(10240)
                    ->openable()
                    ->downloadable()
                    ->deletable(true)
                    ->nullable()
                    ->rules(['nullable', 'required_without:half_year_pdf_path']),
            ]);
    }
}
