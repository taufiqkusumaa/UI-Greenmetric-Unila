<?php

namespace App\Filament\Resources\Universities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UniversityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('country')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('score')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('rank')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
