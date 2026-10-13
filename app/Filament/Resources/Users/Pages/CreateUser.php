<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Dosen;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->hasRole('dosen')) {
            Dosen::create([
                'user_id' => $this->record->id,
                'nip' => $this->data['nip'],
                'nama' => $this->record->name,
            ]);
        }
    }
}
