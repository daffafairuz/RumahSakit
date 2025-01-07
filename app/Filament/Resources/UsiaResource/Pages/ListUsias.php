<?php

namespace App\Filament\Resources\UsiaResource\Pages;

use App\Filament\Resources\UsiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsias extends ListRecords
{
    protected static string $resource = UsiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
