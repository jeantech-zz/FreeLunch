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
        return OrderPlate::select('order_warehouses.*', 'products.name as product_name', 'detail_order_warehouses.quantity as quantity')
        ->join('detail_order_plates', 'detail_order_plates.order_plate_id', '=', 'order_warehouses.id')
        ->join('products', 'detail_order_warehouses.product_id', '=', 'products.id')
        ->orWhere('status', 'LIKE', $status)
        ->get();

    }

}
