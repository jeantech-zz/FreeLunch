<?php

namespace App\Actions\OrderBuy;

use App\Models\OrderBuy;

class UpdateOrderBuyActions
{
    public static function execute(array $data): OrderBuy
    {

        $record = OrderBuy::find($data['id']);

        $record->update([
            'quantity_buys' =>  $data['quantity_buys']
        ]);

        return $record;
    }
}
