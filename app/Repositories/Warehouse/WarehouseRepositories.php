<?php

namespace App\Repositories\Warehouse;

interface WarehouseRepositories
{
    public function warehouseId(string $nameProduct);

    public function listWarehouse();
}
