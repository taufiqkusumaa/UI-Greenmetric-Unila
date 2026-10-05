<?php

namespace App\Filament\Widgets;

use App\Models\University;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopUniversitiesTable extends BaseWidget
{
    protected static ?string $heading = 'Top 10 Universities';
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                University::query()->orderBy('score', 'desc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('rank')
                    ->label('Rank')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country')
                    ->label('Country')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score')
                    ->label('Score')
                    ->numeric()
                    ->sortable(),
            ])
            ->defaultSort('score', 'desc')
            ->paginated([5, 10, 25, 50])
            ->defaultPaginationPageOption(10);
    }
}
