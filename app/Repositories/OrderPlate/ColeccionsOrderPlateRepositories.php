<?php

namespace App\Repositories\OrderPlate;

use App\Models\OrderPlate;
use Illuminate\Database\Eloquent\Collection;

class ColeccionsOrderPlateRepositories implements OrderPlateRepositories
{
    public function listOrderPlate(string $status):Collection
    {
        if($status=="-"){
            $orderPlates = OrderPlate::get();
        }else{
            $orderPlates = OrderPlate::Where('status', 'LIKE', $status)->get();
        }

        return $orderPlates ;

    }

    public function listOrderPlateDetail(string $status):collection
    {
        return OrderPlate::select('order_plates.*', 'detail_order_plates.recipes_id')
        ->join('detail_order_plates', 'detail_order_plates.order_plates_id', '=', 'order_plates.id')
        ->Where('order_plates.status', 'LIKE', $status)
        ->get();

    }

}
