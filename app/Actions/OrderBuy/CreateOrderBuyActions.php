<?php

namespace App\Actions\OrderBuy;

use App\Models\OrderBuy;

class CreateOrderBuyActions
{
    public static function execute(array $data): OrderBuy
    {
        return OrderBuy::create([
            'product_name' => $data['product_name'],
            'order_plates_id' =>  $data['order_plates_id']
        ]);
    }
}
