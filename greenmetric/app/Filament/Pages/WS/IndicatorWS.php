<?php

namespace App\Filament\Pages\WS;

use App\Filament\Pages\BaseIndicatorPage;

class IndicatorWS extends BaseIndicatorPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-trash';
    protected static ?string $navigationLabel = 'Waste (WS)';
    protected static string|\UnitEnum|null $navigationGroup = 'Indikator GreenMetric';
    protected static ?string $title = 'Indikator WS — Waste';
    protected static ?int $navigationSort = 3;
    protected function getCategorySlug(): string
    {
        return 'WS';
    }
}
