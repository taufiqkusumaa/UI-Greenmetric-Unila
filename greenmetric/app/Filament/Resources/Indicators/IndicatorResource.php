<?php

namespace App\Filament\Resources\Indicators;

use App\Filament\Resources\Indicators\Pages\CreateIndicator;
use App\Filament\Resources\Indicators\Pages\EditIndicator;
use App\Filament\Resources\Indicators\Pages\ListIndicators;
use App\Models\Indicator;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class IndicatorResource extends Resource
{
    // Model yang digunakan
    protected static ?string $model = Indicator::class;

    // Ikon navigasi sidebar
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    // Label navigasi dalam bahasa Indonesia
    protected static ?string $navigationLabel = 'Indikator';

    // Nama model dalam bahasa Indonesia
    protected static ?string $modelLabel = 'Indikator';
    protected static ?string $pluralModelLabel = 'Daftar Indikator';

    // Grup navigasi
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    // Urutan navigasi
    protected static ?int $navigationSort = 2;

    public static function form(Schema $form): Schema
    {
        return $form->components([

            // Pilih kategori (SI, EC, WS, WR, TR, ED)
            Forms\Components\Select::make('category_id')
                ->label('Kategori Indikator')
                ->relationship('category', 'name')
                ->searchable()
                ->preload()
                ->required()
                ->helperText('Pilih salah satu dari 6 kategori GreenMetric'),

            // Nama indikator
            Forms\Components\TextInput::make('name')
                ->label('Nama Indikator')
                ->required()
                ->maxLength(255)
                ->placeholder('Contoh: SI1 - Rasio Lahan Hijau'),

            // Deskripsi indikator
            Forms\Components\Textarea::make('description')
                ->label('Deskripsi')
                ->rows(3)
                ->placeholder('Jelaskan apa yang diukur oleh indikator ini'),

            // Satuan pengukuran
            Forms\Components\TextInput::make('unit')
                ->label('Satuan')
                ->placeholder('Contoh: %, ton, kWh, skor')
                ->helperText('Satuan pengukuran nilai indikator'),

            // Skor maksimal
            Forms\Components\TextInput::make('max_score')
                ->label('Skor Maksimal')
                ->numeric()
                ->default(100)
                ->helperText('Skor tertinggi yang bisa dicapai'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom kategori dengan badge warna
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                // Nama indikator
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Indikator')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                // Satuan
                Tables\Columns\TextColumn::make('unit')
                    ->label('Satuan')
                    ->badge()
                    ->color('gray'),

                // Skor maksimal
                Tables\Columns\TextColumn::make('max_score')
                    ->label('Skor Maks')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                // Jumlah submission
                Tables\Columns\TextColumn::make('submissions_count')
                    ->counts('submissions')
                    ->label('Submission')
                    ->alignCenter()
                    ->badge()
                    ->color('info'),
            ])
            ->filters([
                // Filter berdasarkan kategori
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->preload(),
            ])
            ->defaultSort('category_id', 'asc')
            ->recordActions([
                EditAction::make()->label('Ubah'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Hapus'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListIndicators::route('/'),
            'create' => CreateIndicator::route('/create'),
            'edit'   => EditIndicator::route('/{record}/edit'),
        ];
    }
}