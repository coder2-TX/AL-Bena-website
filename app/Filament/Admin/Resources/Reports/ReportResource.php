<?php

namespace App\Filament\Admin\Resources\Reports;

use App\Filament\Admin\Resources\Reports\Pages\CreateReport;
use App\Filament\Admin\Resources\Reports\Pages\EditReport;
use App\Filament\Admin\Resources\Reports\Pages\ListReports;
use App\Filament\Admin\Resources\Reports\Schemas\ReportForm;
use App\Filament\Admin\Resources\Reports\Tables\ReportsTable;
use App\Models\Report;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-chart-pie';
    protected static ?string $navigationLabel = 'التقارير';

    protected static ?string $modelLabel = 'تقرير';

    protected static ?string $pluralModelLabel = 'التقارير';

    public static function form(Schema $schema): Schema
    {
        return ReportForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReportsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReports::route('/'),
            'create' => CreateReport::route('/create'),
            'edit' => EditReport::route('/{record}/edit'),
        ];
    }
}
