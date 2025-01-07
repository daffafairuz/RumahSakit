<?php

namespace App\Filament\Resources\UsiaResource\Pages;

use App\Filament\Resources\UsiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUsia extends EditRecord
{
    protected static string $resource = UsiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
