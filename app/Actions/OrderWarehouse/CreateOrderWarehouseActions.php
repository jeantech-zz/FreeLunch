<?php

namespace App\Actions\OrderWarehouse;

use App\Models\OrderWarehouse;

class CreateOrderWarehouseActions
{
    public static function execute(array $data): OrderWarehouse
    {
        return OrderWarehouse::create([
            'order_plates_id' => $data['order_plates_id'],
            'status' =>  $data['status']
        ]);
    }
}
