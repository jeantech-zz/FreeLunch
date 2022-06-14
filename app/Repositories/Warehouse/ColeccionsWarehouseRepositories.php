<?php

namespace App\Repositories\Warehouse;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Collection;

class ColeccionsWarehouseRepositories implements WarehouseRepositories
{
    public function warehouseId (string $nameProduct)
    {        
        $warehouse =  Warehouse::select('warehouses.*')
                        ->join('products', 'warehouses.product_id', '=', 'products.id')   
                        ->where('products.name',$nameProduct)
                        ->first();
     return $warehouse->id;
    }

    public function listWarehouse()
    {        
        return Warehouse::select('warehouses.*', 'products.name as product_name')
        ->join('products', 'warehouses.product_id', '=', 'products.id')->get();
    }

}