<?php

namespace App\Filament\Resources\SesiAbsensis\Pages;

use App\Filament\Resources\SesiAbsensis\SesiAbsensiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSesiAbsensi extends EditRecord
{
    protected static string $resource = SesiAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
