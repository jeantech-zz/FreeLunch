<?php

namespace App\Actions\OrderWarehouse;

use App\Models\OrderWarehouse;

class CreateOrderWarehouseActions
{
    public static function execute(array $data): Warehouse
    {
        return OrderWarehouse::create([
            'recipe_id' => $data['recipe_id'],
            'order_plates_id' =>  $data['order_plates_id'],
            'status' =>  $data['status']
        ]);
    }
}
