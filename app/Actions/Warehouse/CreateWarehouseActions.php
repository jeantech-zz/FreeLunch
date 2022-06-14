<?php

namespace App\Actions\Warehouse;

use App\Models\Warehouse;

class CreateWarehouseActions
{
    public static function execute(array $data): Warehouse
    {
        return Warehouse::create([
            'product_id' => $data['product_id'],
            'quantity' =>  $data['quantity']
        ]);
    }
}
