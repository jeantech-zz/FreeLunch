<?php

namespace App\Repositories\OrderPlate;

use App\Models\OrderPlate;
use Illuminate\Database\Eloquent\Collection;

class ColeccionsOrderPlateRepositories implements OrderPlateRepositories
{
    public function listOrderPlate(string $status):Collection
    {
        return OrderPlate::Where('status', 'LIKE', $status)
        ->get();

    }

    public function listOrderPlateDetail(string $status):collection
    {
        return OrderPlate::select('order_plates.*', 'detail_order_plates.recipes_id')
        ->join('detail_order_plates', 'detail_order_plates.order_plates_id', '=', 'order_plates.id')
        ->Where('order_plates.status', 'LIKE', $status)
        ->get();

    }

}
