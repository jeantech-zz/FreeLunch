<?php

namespace App\Actions\DetailWarehouse;

use App\Models\DetailWarehouse;

class CreateDetailWarehouseActions
{
    public static function execute(array $data): Warehouse
    {
        return DetailWarehouse::create([
            'order_warehouses_id' => $data['order_warehouses_id'],
            'product_id' => $data['product_id'],
            'quantity' =>  $data['quantity']
        ]);
    }
}
