<?php

namespace App\Filament\Admin\Resources\FooterSettings;

use App\Filament\Admin\Resources\FooterSettings\Pages\CreateFooterSetting;
use App\Filament\Admin\Resources\FooterSettings\Pages\EditFooterSetting;
use App\Filament\Admin\Resources\FooterSettings\Pages\ListFooterSettings;
use App\Filament\Admin\Resources\FooterSettings\Schemas\FooterSettingForm;
use App\Filament\Admin\Resources\FooterSettings\Tables\FooterSettingsTable;
use App\Models\FooterSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FooterSettingResource extends Resource
{
    protected static ?string $model = FooterSetting::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'إعدادات أسفل الصفحة';
    protected static ?string $modelLabel = 'إعداد';
    protected static ?string $pluralModelLabel = 'إعدادات أسفل الصفحة';
    public static function form(Schema $schema): Schema
    {
        return FooterSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FooterSettingsTable::configure($table);
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
            'index' => ListFooterSettings::route('/'),
            'create' => CreateFooterSetting::route('/create'),
            'edit' => EditFooterSetting::route('/{record}/edit'),
        ];
    }
}
