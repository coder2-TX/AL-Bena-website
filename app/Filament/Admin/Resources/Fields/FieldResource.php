<?php

namespace App\Filament\Admin\Resources\Fields;

use App\Filament\Admin\Resources\Fields\Pages\CreateField;
use App\Filament\Admin\Resources\Fields\Pages\EditField;
use App\Filament\Admin\Resources\Fields\Pages\ListFields;
use App\Filament\Admin\Resources\Fields\Schemas\FieldForm;
use App\Filament\Admin\Resources\Fields\Tables\FieldsTable;
use App\Models\Field;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FieldResource extends Resource
{
    protected static ?string $model = Field::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-briefcase';
    
    protected static ?string $navigationLabel = 'المجالات';

    protected static ?string $modelLabel = 'مجال';

    protected static ?string $pluralModelLabel = 'المجالات';
    
    public static function form(Schema $schema): Schema
    {
        return FieldForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FieldsTable::configure($table);
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
            'index' => ListFields::route('/'),
            'create' => CreateField::route('/create'),
            'edit' => EditField::route('/{record}/edit'),
        ];
    }
}
