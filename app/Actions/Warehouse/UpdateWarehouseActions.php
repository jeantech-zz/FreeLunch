<?php

namespace App\Actions\Warehouse;

use App\Models\Warehouse;

class UpdateWarehouseActions
{
    public static function execute(array $data): Warehouse
    {

        $record = Warehouse::find($data['id']);

        $record->update([
            'quantity' =>  $data['quantity']
        ]);

        return $record;
    }
}
