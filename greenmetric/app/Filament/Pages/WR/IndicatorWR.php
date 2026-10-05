<?php

namespace App\Filament\Pages\WR;

use App\Filament\Pages\BaseIndicatorPage;

class IndicatorWR extends BaseIndicatorPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationLabel = 'Water (WR)';
    protected static string|\UnitEnum|null $navigationGroup = 'Indikator GreenMetric';
    protected static ?string $title = 'Indikator WR — Water';
    protected static ?int $navigationSort = 4;
    protected function getCategorySlug(): string { return 'WR'; }
}
