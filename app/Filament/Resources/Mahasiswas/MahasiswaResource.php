<?php

namespace App\Filament\Resources\Mahasiswas;

use App\Filament\Resources\Mahasiswas\Pages\CreateMahasiswa;
use App\Filament\Resources\Mahasiswas\Pages\EditMahasiswa;
use App\Filament\Resources\Mahasiswas\Pages\ListMahasiswas;
use App\Filament\Resources\Mahasiswas\Schemas\MahasiswaForm;
use App\Filament\Resources\Mahasiswas\Tables\MahasiswasTable;
use App\Models\Mahasiswa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'mahasiswa';

    protected static ?string $navigationLabel = 'Mahasiswa';

    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Data';

    public static function form(Schema $schema): Schema
    {
        return MahasiswaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MahasiswasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMahasiswas::route('/'),
            'create' => CreateMahasiswa::route('/create'),
            'edit' => EditMahasiswa::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if (! $user?->isSuperAdmin()) {
            $query->whereHas('kelas.jadwal', fn ($q) => $q->where('dosen_id', $user?->dosenId() ?? 0));
        }

        return $query;
    }
}
