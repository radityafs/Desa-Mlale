<?php

namespace App\Filament\Resources\WargaResource\Pages;

use App\Filament\Resources\WargaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWarga extends CreateRecord
{
    protected static string $resource = WargaResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
