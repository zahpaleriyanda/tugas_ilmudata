<?php

namespace App\Filament\Resources\SesiAbsensis;

use App\Filament\Resources\SesiAbsensis\Pages\CreateSesiAbsensi;
use App\Filament\Resources\SesiAbsensis\Pages\EditSesiAbsensi;
use App\Filament\Resources\SesiAbsensis\Pages\ListSesiAbsensis;
use App\Filament\Resources\SesiAbsensis\Schemas\SesiAbsensiForm;
use App\Filament\Resources\SesiAbsensis\Tables\SesiAbsensisTable;
use App\Models\SesiAbsensi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SesiAbsensiResource extends Resource
{
    protected static ?string $model = SesiAbsensi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'sesiAbsensi';

    protected static ?string $navigationLabel = 'Sesi Absensi';

    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Absensi';

    public static function form(Schema $schema): Schema
    {
        return SesiAbsensiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SesiAbsensisTable::configure($table);
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
            'index' => ListSesiAbsensis::route('/'),
            'create' => CreateSesiAbsensi::route('/create'),
            'edit' => EditSesiAbsensi::route('/{record}/edit'),
        ];
    }
}
