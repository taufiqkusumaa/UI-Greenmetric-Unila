<?php

namespace App\Filament\Resources\Submissions;

use App\Filament\Resources\Submissions\Pages\CreateSubmission;
use App\Filament\Resources\Submissions\Pages\EditSubmission;
use App\Filament\Resources\Submissions\Pages\ListSubmissions;
use App\Models\Submission;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class SubmissionResource extends Resource
{
    // Model yang digunakan
    protected static ?string $model = Submission::class;

    // Ikon navigasi
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-check';

    // Label dalam bahasa Indonesia
    protected static ?string $navigationLabel = 'Submission Data';
    protected static ?string $modelLabel = 'Submission';
    protected static ?string $pluralModelLabel = 'Daftar Submission';

    // Grup navigasi
    protected static string|\UnitEnum|null $navigationGroup = 'Submissions';

    public static function form(Schema $form): Schema
    {
        return $form->components([

            // Pilih universitas
            Forms\Components\Select::make('university_id')
                ->label('Universitas')
                ->relationship('university', 'name')
                ->searchable()
                ->preload()
                ->required()
                ->helperText('Pilih universitas yang mengirimkan data'),

            // Pilih indikator
            Forms\Components\Select::make('indicator_id')
                ->label('Indikator')
                ->relationship('indicator', 'name')
                ->searchable()
                ->preload()
                ->required()
                ->helperText('Pilih indikator GreenMetric yang dilaporkan'),

            // Nilai aktual
            Forms\Components\TextInput::make('value')
                ->label('Nilai')
                ->numeric()
                ->required()
                ->helperText('Nilai aktual pengukuran indikator'),

            // Skor yang diperoleh
            Forms\Components\TextInput::make('score')
                ->label('Skor')
                ->numeric()
                ->required()
                ->minValue(0)
                ->maxValue(100)
                ->helperText('Skor yang diperoleh (0-100)'),

            // Tahun pelaporan
            Forms\Components\TextInput::make('year')
                ->label('Tahun')
                ->numeric()
                ->default(date('Y'))
                ->required()
                ->helperText('Tahun data yang dilaporkan'),

            // Status submission
            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'draft'     => 'Draft',
                    'submitted' => 'Dikirim',
                    'verified'  => 'Terverifikasi',
                ])
                ->default('draft')
                ->required()
                ->helperText('Status verifikasi data submission'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Nama universitas
                Tables\Columns\TextColumn::make('university.name')
                    ->label('Universitas')
                    ->searchable()
                    ->sortable(),

                // Kategori indikator
                Tables\Columns\TextColumn::make('indicator.category.name')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),

                // Nama indikator
                Tables\Columns\TextColumn::make('indicator.name')
                    ->label('Indikator')
                    ->searchable()
                    ->wrap()
                    ->limit(50),

                // Nilai
                Tables\Columns\TextColumn::make('value')
                    ->label('Nilai')
                    ->numeric()
                    ->alignCenter(),

                // Skor
                Tables\Columns\TextColumn::make('score')
                    ->label('Skor')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                // Tahun
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable()
                    ->alignCenter(),

                // Status dengan warna
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'verified'  => 'success',
                        'submitted' => 'warning',
                        'draft'     => 'gray',
                        default     => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'verified'  => 'Terverifikasi',
                        'submitted' => 'Dikirim',
                        'draft'     => 'Draft',
                        default     => $state,
                    }),
            ])
            ->filters([
                // Filter berdasarkan status
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft'     => 'Draft',
                        'submitted' => 'Dikirim',
                        'verified'  => 'Terverifikasi',
                    ]),

                // Filter berdasarkan tahun
                Tables\Filters\SelectFilter::make('year')
                    ->label('Tahun')
                    ->options(
                        Submission::distinct()
                            ->pluck('year', 'year')
                            ->toArray()
                    ),

                // Filter berdasarkan kategori
                Tables\Filters\SelectFilter::make('indicator.category')
                    ->label('Kategori')
                    ->relationship('indicator.category', 'name'),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index'  => ListSubmissions::route('/'),
            'create' => CreateSubmission::route('/create'),
            'edit'   => EditSubmission::route('/{record}/edit'),
        ];
    }
}