<?php

namespace App\Repositories\OrderWarehouse;

use App\Models\OrderWarehouse;
use Illuminate\Database\Eloquent\Collection;

class ColeccionsOrderWarehouseRepositories implements OrderWarehouseRepositories
{
    public function listOrderWarehouse(string $status):collection
    {
        return OrderWarehouse::orWhere('status', 'LIKE', '%'.$status.'%')
        ->get();

    }

    public function listOrderWarehouseDetail(string $status):collection
    {
        return OrderWarehouse::select('order_warehouses.*', 'products.name as product_name', 'detail_order_warehouses.quantity as quantity')
        ->join('detail_order_warehouses', 'detail_order_warehouses.order_warehouses_id', '=', 'order_warehouses.id')
        ->join('products', 'detail_order_warehouses.product_id', '=', 'products.id')
        ->orWhere('status', 'LIKE', $status)
        ->get();

    }

}
