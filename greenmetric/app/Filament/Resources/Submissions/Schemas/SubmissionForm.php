<?php

namespace App\Filament\Resources\Submissions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('university_id')
                    ->relationship('university', 'name')
                    ->required(),
                Select::make('indicator_id')
                    ->relationship('indicator', 'name')
                    ->required(),
                TextInput::make('value')
                    ->required()
                    ->numeric(),
                TextInput::make('score')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('year')
                    ->required(),
                Select::make('status')
                    ->options(['draft' => 'Draft', 'submitted' => 'Submitted', 'verified' => 'Verified'])
                    ->default('draft')
                    ->required(),
            ]);
    }
}
