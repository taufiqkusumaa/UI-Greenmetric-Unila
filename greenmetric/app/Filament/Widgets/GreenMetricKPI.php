<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Indicator;
use App\Models\Submission;
use App\Models\University;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GreenMetricKPI extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalSubmissions    = Submission::count();
        $verifiedSubmissions = Submission::where('status', 'verified')->count();
        $avgScore            = University::avg('score') ?? 0;
        $topScore            = University::max('score') ?? 0;
        $totalIndicators     = Indicator::count();
        $totalCategories     = Category::count();

        $verifiedRate = $totalSubmissions > 0
            ? round(($verifiedSubmissions / $totalSubmissions) * 100, 1)
            : 0;

        return [
            Stat::make('🏛️ Overall Rangking', University::count())
                ->color('success'),

            Stat::make('📊 Setting and Infrastrcture', number_format($avgScore, 0))
                ->color('info'),

            Stat::make('🏆 Energy and Climate Change', number_format($topScore, 0))
                ->color('warning'),

            Stat::make('✅ Waste', $verifiedSubmissions)
                ->color('success'),

            Stat::make('📋 Water', $totalIndicators)
                ->color('primary'),

            Stat::make('📝 Transportation', $totalSubmissions)
                ->color('gray'),

            Stat::make('📝 Education and Research', $totalSubmissions)
                ->color('gray'),
        ];
    }
}