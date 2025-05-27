<?php

namespace App\Filament\Owner\Resources\TransactionResource\Pages;

use App\Filament\Owner\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
}
