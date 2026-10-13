<?php

namespace App\Filament\Resources\MataKuliahs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class MataKuliahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->label('kode Mata Kuliah')
                    ->required(),
                TextInput::make('nama')
                    ->label('Nama Mata Kuliah')
                    ->required(),
                TextInput::make('sks')
                    ->label('SKS')
                    ->required(),
            ]);
    }
}
