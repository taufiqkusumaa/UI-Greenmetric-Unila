<?php

namespace App\Filament\Resources\Universities;

use App\Filament\Resources\Universities\Pages\CreateUniversity;
use App\Filament\Resources\Universities\Pages\EditUniversity;
use App\Filament\Resources\Universities\Pages\ListUniversities;
use App\Models\University;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class UniversityResource extends Resource
{
    protected static ?string $model = University::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-building-library';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    public static function form(Schema $form): Schema
    {
        return $form->components([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('country')
                ->required(),
            Forms\Components\TextInput::make('email')
                ->email(),
            Forms\Components\TextInput::make('score')
                ->numeric()
                ->default(0),
            Forms\Components\TextInput::make('rank')
                ->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rank')
                    ->sortable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('score')
                    ->sortable()
                    ->numeric(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('country')
                    ->options(fn () => University::distinct()->pluck('country', 'country')),
            ])
            ->defaultSort('rank');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListUniversities::route('/'),
            'create' => CreateUniversity::route('/create'),
            'edit'   => EditUniversity::route('/{record}/edit'),
        ];
    }
}