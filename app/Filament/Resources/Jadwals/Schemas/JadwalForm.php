<?php

namespace App\Filament\Resources\Jadwals\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class JadwalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('dosen_id')
                    ->label('Dosen')
                    ->relationship('dosen', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('mata_kuliah_id')
                    ->label('Mata Kuliah')
                    ->relationship('mataKuliah', 'nama')
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->kode} - {$record->nama}")
                    ->searchable(['kode', 'nama'])
                    ->preload()
                    ->required(),

                Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'nama_kelas')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('tahun_ajaran')
                    ->placeholder('2025/2026')
                    ->regex('/^\d{4}\/\d{4}$/')
                    ->maxLength(9)
                    ->required(),

                Select::make('semester')
                    ->options([
                        'ganjil' => 'Ganjil',
                        'genap' => 'Genap',
                    ])
                    ->required(),

                Select::make('hari')
                    ->options([
                        'senin' => 'Senin',
                        'selasa' => 'Selasa',
                        'rabu' => 'Rabu',
                        'kamis' => 'Kamis',
                        'jumat' => 'Jumat',
                        'sabtu' => 'Sabtu',
                    ])
                    ->required(),

                TimePicker::make('jam_mulai')
                    ->seconds(false)
                    ->required(),

                TimePicker::make('jam_selesai')
                    ->seconds(false)
                    ->after('jam_mulai')
                    ->required(),

                TextInput::make('ruangan'),
            ]);
    }
}