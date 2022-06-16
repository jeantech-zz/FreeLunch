<?php

namespace App\Repositories\OrderWarehouse;

interface OrderWarehouseRepositories
{
    public function listOrderWarehouse(string $status);

    public function listOrderWarehouseDetail(string $status);

}
