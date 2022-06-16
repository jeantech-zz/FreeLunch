<?php

namespace App\Actions\DetailOrderPlate;

use App\Models\DetailOrderPlate;

class CreateDetailOrderPlateActions
{
    public static function execute(array $data): DetailOrderPlate
    {
        return DetailOrderPlate::create([
            'order_plates_id' => $data['order_plates_id'],
            'recipes_id' =>  $data['recipes_id']
        ]);
    }
}

