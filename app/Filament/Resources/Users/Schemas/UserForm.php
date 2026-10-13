<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $operation) => $operation === 'create'),

                    Select::make('roles')
                        ->label('Role')
                        ->relationship('roles', 'name')
                        ->preload()
                        ->searchable()
                        ->required()
                        ->live(), // supaya field NIP bereaksi saat role berubah

                    TextInput::make('nip')
                        ->label('NIP')
                        ->dehydrated(false) // nip bukan kolom tabel users
                        ->visible(fn (Get $get) => static::isDosen($get('roles')))
                        ->required(fn (Get $get) => static::isDosen($get('roles')))
                        ->unique(table: 'dosen', column: 'nip', ignorable: fn ($record) => $record?->dosen),
            ]);
    }

    protected static function isDosen(mixed $roleIds): bool
    {
        $ids = array_filter(Arr::wrap($roleIds));

        return filled($ids)
            && Role::whereIn('id', $ids)->where('name', 'dosen')->exists();
    }
}