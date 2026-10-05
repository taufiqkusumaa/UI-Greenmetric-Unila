<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CategoryProgressChart;
use App\Filament\Widgets\GreenMetricKPI;
use App\Filament\Widgets\RecentActivityTable;
use App\Filament\Widgets\TopUniversitiesTable;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Dashboard';
    protected static ?int $navigationSort = -1;

    public function getWidgets(): array
    {
        return [
            GreenMetricKPI::class,
            CategoryProgressChart::class,
            TopUniversitiesTable::class,
            RecentActivityTable::class,
        ];
    }

    public function getColumns(): int|array
    {
        return 2;
    }
}
