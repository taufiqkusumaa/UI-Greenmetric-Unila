<?php

namespace App\Filament\Pages\ED;

use App\Filament\Pages\BaseIndicatorPage;

class IndicatorED extends BaseIndicatorPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Education & Research (ED)';
    protected static string|\UnitEnum|null $navigationGroup = 'Indikator GreenMetric';
    protected static ?string $title = 'Indikator ED — Education & Research';
    protected static ?int $navigationSort = 6;
    protected function getCategorySlug(): string { return 'ED'; }
}
