<?php

namespace App\Filament\Pages\EC;

use App\Filament\Pages\BaseIndicatorPage;

class IndicatorEC extends BaseIndicatorPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationLabel = 'Energy & Climate Change (EC)';
    protected static string|\UnitEnum|null $navigationGroup = 'Indikator GreenMetric';
    protected static ?string $title = 'Indikator EC — Energy & Climate Change';
    protected static ?int $navigationSort = 2;
    protected function getCategorySlug(): string { return 'EC'; }
}
