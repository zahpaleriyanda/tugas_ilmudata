<?php

namespace App\Filament\Resources\Jadwals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JadwalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dosen.nama')
                    ->label('Dosen')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('mataKuliah.nama')
                    ->label('Mata Kuliah')
                    ->description(fn ($record) => $record->mataKuliah?->kode)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kelas.nama_kelas')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('hari')
                    ->label('Hari')
                    ->formatStateUsing(fn (string $state) => ucfirst($state))
                    ->searchable(),

                TextColumn::make('jam_mulai')
                    ->label('Jam Mulai')
                    ->time('H:i'),

                TextColumn::make('jam_selesai')
                    ->label('Jam Selesai')
                    ->time('H:i'),

                TextColumn::make('ruangan')
                    ->label('Ruangan')
                    ->toggleable(),

                TextColumn::make('tahun_ajaran')
                    ->label('Tahun Ajaran')
                    ->searchable(),

                TextColumn::make('semester')
                    ->label('Semester')
                    ->formatStateUsing(fn (string $state) => ucfirst($state)),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}