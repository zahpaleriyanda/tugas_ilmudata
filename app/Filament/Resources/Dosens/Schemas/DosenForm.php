<?php

namespace App\Filament\Resources\Dosens\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class DosenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Akun User')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('nip')
                    ->label('NIP')
                    ->required(),
                TextInput::make('nama')
                    ->label('Nama Dosen')
                    ->required(),
            ]);
    }
}
