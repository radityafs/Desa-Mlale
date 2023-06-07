<?php

namespace App\Filament\Resources\AgendaResource\Pages;

use App\Filament\Resources\AgendaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgendas extends ListRecords
{
    protected static string $resource = AgendaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
