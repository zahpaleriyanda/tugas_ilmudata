<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Models\Dosen;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['nip'] = $this->record->dosen?->nip;

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->record->hasRole('dosen')) {
            Dosen::updateOrCreate(
                ['user_id' => $this->record->id],
                ['nip' => $this->data['nip'], 'nama' => $this->record->name],
            );
        }
    }
}
