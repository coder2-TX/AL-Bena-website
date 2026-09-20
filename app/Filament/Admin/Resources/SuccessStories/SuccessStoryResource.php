<?php

namespace App\Filament\Admin\Resources\SuccessStories;

use App\Filament\Admin\Resources\SuccessStories\Pages\CreateSuccessStory;
use App\Filament\Admin\Resources\SuccessStories\Pages\EditSuccessStory;
use App\Filament\Admin\Resources\SuccessStories\Pages\ListSuccessStories;
use App\Filament\Admin\Resources\SuccessStories\Schemas\SuccessStoryForm;
use App\Filament\Admin\Resources\SuccessStories\Tables\SuccessStoriesTable;
use App\Models\SuccessStory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SuccessStoryResource extends Resource
{
    protected static ?string $model = SuccessStory::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'قصص النجاح';

    protected static ?string $modelLabel = 'قصة نجاح';

    protected static ?string $pluralModelLabel = 'قصص النجاح';

    public static function form(Schema $schema): Schema
    {
        return SuccessStoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuccessStoriesTable::configure($table);
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
            'index' => ListSuccessStories::route('/'),
            'create' => CreateSuccessStory::route('/create'),
            'edit' => EditSuccessStory::route('/{record}/edit'),
        ];
    }
}
