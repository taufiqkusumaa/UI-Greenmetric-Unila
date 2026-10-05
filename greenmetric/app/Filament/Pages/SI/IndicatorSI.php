<?php

namespace App\Filament\Pages\SI;

use App\Filament\Pages\BaseIndicatorPage;

class IndicatorSI extends BaseIndicatorPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Setting & Infrastructure (SI)';
    protected static string|\UnitEnum|null $navigationGroup = 'Indikator GreenMetric';
    protected static ?string $title = 'Indikator SI — Setting & Infrastructure';
    protected static ?int $navigationSort = 1;
    protected function getCategorySlug(): string { return 'SI'; }
}
