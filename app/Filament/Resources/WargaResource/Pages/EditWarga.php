<?php

namespace App\Filament\Resources\WargaResource\Pages;

use App\Filament\Resources\WargaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWarga extends EditRecord
{
    protected static string $resource = WargaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
