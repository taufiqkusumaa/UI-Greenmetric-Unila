<?php

namespace App\Filament\Pages\TR;

use App\Filament\Pages\BaseIndicatorPage;

class IndicatorTR extends BaseIndicatorPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Transportation (TR)';
    protected static string|\UnitEnum|null $navigationGroup = 'Indikator GreenMetric';
    protected static ?string $title = 'Indikator TR — Transportation';
    protected static ?int $navigationSort = 5;
    protected function getCategorySlug(): string { return 'TR'; }
}
