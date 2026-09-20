<?php

namespace App\Filament\Widgets;

use App\Models\Field;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\News;
use App\Models\SuccessStory;
use App\Models\Report;
use App\Models\ContactMessage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('المجالات', Field::count())
                ->icon('heroicon-o-tag')
                ->color('primary'),

            Stat::make('الصور', Gallery::count())
                ->icon('heroicon-o-photo')
                ->color('success'),

            Stat::make('المشاريع', Project::count())
                ->icon('heroicon-o-folder-open')
                ->color('warning'),

            Stat::make('الأخبار', News::count())
                ->icon('heroicon-o-newspaper')
                ->color('info'),

            Stat::make('قصص النجاح', SuccessStory::count())
                ->icon('heroicon-o-star')
                ->color('danger'),

            Stat::make('التقارير', Report::count())
                ->icon('heroicon-o-document-text')
                ->color('gray'),

            Stat::make('رسائل التواصل', ContactMessage::count())
                ->icon('heroicon-o-envelope')
                ->color('secondary'),
        ];
    }
}