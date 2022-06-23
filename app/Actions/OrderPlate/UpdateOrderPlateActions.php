<?php

namespace App\Actions\OrderPlate;

use App\Models\OrderPlate;

class UpdateOrderPlateActions
{
    public static function execute(array $data): OrderPlate
    {
        $record = OrderPlate::find($data['id']);

        $record->update([
            'status' =>  $data['status']
        ]);

        return $record;
    }
}
