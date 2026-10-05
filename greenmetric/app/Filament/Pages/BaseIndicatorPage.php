<?php

namespace App\Filament\Pages;

use App\Models\Category;
use App\Models\Indicator;
use App\Models\Submission;
use Filament\Pages\Page;

abstract class BaseIndicatorPage extends Page
{
    protected string $view = 'filament.pages.indicator-dashboard';

    abstract protected function getCategorySlug(): string;

    public function getViewData(): array
    {
        $category = Category::where('slug', $this->getCategorySlug())->first();

        if (!$category) {
            return [
                'categoryName'  => 'Kategori tidak ditemukan',
                'categorySlug'  => $this->getCategorySlug(),
                'categoryColor' => '#9ca3af',
                'stats'         => $this->emptyStats(),
                'indicators'    => collect(),
                'submissions'   => collect(),
                'chartData'     => $this->emptyChartData(),
            ];
        }

        $indicators = Indicator::where('category_id', $category->id)
            ->withCount('submissions')
            ->get();

        $submissions = Submission::whereHas('indicator', fn ($q) =>
            $q->where('category_id', $category->id)
        )->with(['indicator', 'university'])
         ->latest()
         ->take(10)
         ->get();

        $allSubmissions = Submission::whereHas('indicator', fn ($q) =>
            $q->where('category_id', $category->id)
        )->get();

        $stats = [
            'total'     => $allSubmissions->count(),
            'verified'  => $allSubmissions->where('status', 'verified')->count(),
            'submitted' => $allSubmissions->where('status', 'submitted')->count(),
            'draft'     => $allSubmissions->where('status', 'draft')->count(),
            'avg_score' => round($allSubmissions->avg('score') ?? 0, 1),
            'max_score' => round($allSubmissions->max('score') ?? 0, 1),
            'min_score' => round($allSubmissions->min('score') ?? 0, 1),
        ];

        return [
            'categoryName'  => $category->name,
            'categorySlug'  => $category->slug,
            'categoryColor' => $category->color,
            'stats'         => $stats,
            'indicators'    => $indicators,
            'submissions'   => $submissions,
            'chartData'     => $this->prepareChartData($indicators, $category),
        ];
    }

    private function prepareChartData($indicators, $category): array
    {
        $baseColors = [
            '#2196F3', '#42A5F5', '#64B5F6', '#90CAF9',
            '#FF9800', '#FFA726', '#FFB74D', '#FFCC02',
            '#9C27B0', '#AB47BC', '#BA68C8', '#CE93D8',
            '#00BCD4', '#26C6DA', '#4DD0E1', '#80DEEA',
            '#F44336', '#EF5350', '#E57373', '#EF9A9A',
            '#4CAF50', '#66BB6A', '#81C784', '#A5D6A7',
        ];

        $labels = [];
        $scores = [];
        $colors = [];
        $counts = [];

        foreach ($indicators as $index => $indicator) {
            $labels[] = $indicator->name;
            $scores[]  = round(Submission::where('indicator_id', $indicator->id)->avg('score') ?? 0, 1);
            $counts[]  = Submission::where('indicator_id', $indicator->id)->count();
            $colors[]  = $baseColors[$index] ?? $category->color;
        }

        return compact('labels', 'scores', 'colors', 'counts');
    }

    private function emptyStats(): array
    {
        return [
            'total'     => 0,
            'verified'  => 0,
            'submitted' => 0,
            'draft'     => 0,
            'avg_score' => 0,
            'max_score' => 0,
            'min_score' => 0,
        ];
    }

    private function emptyChartData(): array
    {
        return [
            'labels' => [],
            'scores' => [],
            'colors' => [],
            'counts' => [],
        ];
    }
}