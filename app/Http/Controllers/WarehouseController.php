<?php

namespace App\Http\Controllers; 

use App\Actions\Warehouse\UpdateWarehouseActions;
use App\Repositories\Warehouse\ColeccionsWarehouseRepositories;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class WarehouseController extends Controller
{
    private ColeccionsWarehouseRepositories $coleccionWarehouse;

    public function __construct()
    {
        $this->coleccionWarehouse = new ColeccionsWarehouseRepositories;
    }

    public function index():collection
    {
      return $this->coleccionWarehouse->listWarehouse();
    }

    public function updateCountProductWarehouse(array $data)
    {
        $idWarehouse =   $this->coleccionWarehouse->warehouseId($data["product_name"]);

        $warehouseUpdate = [
                    "id" => $idWarehouse,
                    "quantity" => $data["quantity"]
                    ] ;
        $warehouseUpdate = UpdateWarehouseActions::execute($warehouseUpdate);
    }

}
