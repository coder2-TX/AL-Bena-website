<?php

namespace App\Filament\Admin\Resources\AboutSections;

use App\Filament\Admin\Resources\AboutSections\Pages\CreateAboutSection;
use App\Filament\Admin\Resources\AboutSections\Pages\EditAboutSection;
use App\Filament\Admin\Resources\AboutSections\Pages\ListAboutSections;
use App\Filament\Admin\Resources\AboutSections\Schemas\AboutSectionForm;
use App\Filament\Admin\Resources\AboutSections\Tables\AboutSectionsTable;
use App\Models\AboutSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutSectionResource extends Resource
{
    protected static ?string $model = AboutSection::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'من نحن';

    protected static ?string $modelLabel = 'قسم من نحن';

    protected static ?string $pluralModelLabel = 'قسم من نحن';

    public static function form(Schema $schema): Schema
    {
        return AboutSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutSectionsTable::configure($table);
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
            'index' => ListAboutSections::route('/'),
            'create' => CreateAboutSection::route('/create'),
            'edit' => EditAboutSection::route('/{record}/edit'),
        ];
    }
}
