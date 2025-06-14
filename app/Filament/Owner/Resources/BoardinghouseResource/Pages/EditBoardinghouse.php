<?php

namespace App\Filament\Owner\Resources\BoardingHouseResource\Pages;

use App\Filament\Owner\Resources\BoardingHouseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBoardingHouse extends EditRecord
{
    protected static string $resource = BoardingHouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
