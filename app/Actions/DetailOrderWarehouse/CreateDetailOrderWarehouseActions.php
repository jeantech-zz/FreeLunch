<?php

namespace App\Actions\DetailOrderWarehouse;

use App\Models\DetailOrderWarehouse;

class CreateDetailOrderWarehouseActions
{
    public static function execute(array $data): DetailOrderWarehouse
    {
        return DetailOrderWarehouse::create([
            'order_warehouses_id' => $data['order_warehouses_id'],
            'product_id' => $data['product_id'],
            'quantity' =>  $data['quantity']
        ]);
    }
}
