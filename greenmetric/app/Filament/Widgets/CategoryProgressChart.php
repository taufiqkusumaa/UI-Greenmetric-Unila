<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Submission;
use Filament\Widgets\ChartWidget;

class CategoryProgressChart extends ChartWidget
{
    public ?string $heading = 'Perkembangan Skor Per Kategori';
    protected static ?int $sort = 2;

    // Lebar penuh agar tidak terjepit oleh kolom lain
    protected int|string|array $columnSpan = 'full';

    // Tinggi tetap (non-static, sesuai Filament v4)
    public ?string $maxHeight = '420px';

    protected function getData(): array
    {
        $categories = Category::all();

        $avgScores = $categories->map(fn ($cat) =>
            round(Submission::whereHas('indicator', fn ($q) =>
                $q->where('category_id', $cat->id)
            )->avg('score') ?? 0, 2)
        )->toArray();

        $maxScores = $categories->map(fn ($cat) =>
            round(Submission::whereHas('indicator', fn ($q) =>
                $q->where('category_id', $cat->id)
            )->max('score') ?? 0, 2)
        )->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Rata-rata Skor',
                    'data'  => $avgScores,
                    'backgroundColor' => $categories->pluck('color')->toArray(),
                    'borderRadius' => 6,
                ],
                [
                    'label' => 'Skor Tertinggi',
                    'data'  => $maxScores,
                    'backgroundColor' => $categories->pluck('color')
                        ->map(fn ($c) => $c . '66')
                        ->toArray(),
                    'borderRadius' => 6,
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'max' => 100,
                    'ticks' => ['stepSize' => 10],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
