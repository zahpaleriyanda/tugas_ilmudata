<?php

namespace App\Filament\Resources\SesiAbsensis\Pages;

use App\Filament\Resources\SesiAbsensis\SesiAbsensiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSesiAbsensis extends ListRecords
{
    protected static string $resource = SesiAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
