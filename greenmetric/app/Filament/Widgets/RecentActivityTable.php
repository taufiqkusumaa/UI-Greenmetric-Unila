<?php

namespace App\Filament\Widgets;

use App\Models\Submission;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentActivityTable extends BaseWidget
{
    protected static ?string $heading = '🕒 Aktivitas Submission Terbaru';
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Submission::query()
                    ->with(['university', 'indicator.category'])
                    ->latest('created_at')
            )
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('university.name')
                    ->label('Universitas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('indicator.category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('indicator.name')
                    ->label('Indikator')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Nilai')
                    ->numeric(),
                Tables\Columns\TextColumn::make('score')
                    ->label('Skor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'verified'  => 'success',
                        'submitted' => 'warning',
                        default     => 'gray',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10, 25, 50])
            ->defaultPaginationPageOption(10);
    }
}
