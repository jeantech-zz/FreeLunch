<?php

namespace App\Actions\Warehouse;

use App\Models\OrderWarehouse;

class UpdateOrderWarehouseActions
{
    public static function execute(array $data): Product
    {
      
        $record = OrderWarehouse::find($data['id']);
        
        $record->update([ 
            'status' =>  $data['status']
        ]);

        return $record;
    }
}