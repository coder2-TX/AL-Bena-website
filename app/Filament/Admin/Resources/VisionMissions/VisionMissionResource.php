<?php

namespace App\Filament\Admin\Resources\VisionMissions;

use App\Filament\Admin\Resources\VisionMissions\Pages\CreateVisionMission;
use App\Filament\Admin\Resources\VisionMissions\Pages\EditVisionMission;
use App\Filament\Admin\Resources\VisionMissions\Pages\ListVisionMissions;
use App\Filament\Admin\Resources\VisionMissions\Schemas\VisionMissionForm;
use App\Filament\Admin\Resources\VisionMissions\Tables\VisionMissionsTable;
use App\Models\VisionMission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VisionMissionResource extends Resource
{
    protected static ?string $model = VisionMission::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-eye';

    protected static ?string $navigationLabel = 'الرؤية والرسالة';

    protected static ?string $modelLabel = 'رؤية أو رسالة';

    protected static ?string $pluralModelLabel = 'الرؤية والرسالة';

    public static function form(Schema $schema): Schema
    {
        return VisionMissionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisionMissionsTable::configure($table);
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
            'index' => ListVisionMissions::route('/'),
            'create' => CreateVisionMission::route('/create'),
            'edit' => EditVisionMission::route('/{record}/edit'),
        ];
    }
}
