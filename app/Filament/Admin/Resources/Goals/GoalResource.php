<?php

namespace App\Filament\Admin\Resources\Goals;

use App\Filament\Admin\Resources\Goals\Pages\CreateGoal;
use App\Filament\Admin\Resources\Goals\Pages\EditGoal;
use App\Filament\Admin\Resources\Goals\Pages\ListGoals;
use App\Filament\Admin\Resources\Goals\Schemas\GoalForm;
use App\Filament\Admin\Resources\Goals\Tables\GoalsTable;
use App\Models\Goal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GoalResource extends Resource
{
    protected static ?string $model = Goal::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationLabel = 'الأهداف';
    protected static ?string $modelLabel = 'هدف';
    protected static ?string $pluralModelLabel = 'الأهداف';

    public static function form(Schema $schema): Schema
    {
        return GoalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GoalsTable::configure($table);
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
            'index' => ListGoals::route('/'),
            'create' => CreateGoal::route('/create'),
            'edit' => EditGoal::route('/{record}/edit'),
        ];
    }
}
