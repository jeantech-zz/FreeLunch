<?php

namespace App\Actions\OrderPlate;

use App\Models\OrderPlate;

class CreateOrderPlateActions
{
    public static function execute(array $data): OrderPlate
    {
        return OrderPlate::create([
            'quantity' => $data['quantity'],
            'status' =>  $data['status']
        ]);
    }
}
