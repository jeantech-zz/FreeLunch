<?php

namespace App\Repositories\OrderPlate;

interface OrderPlateRepositories
{
    public function listOrderPlate(string $status);

    public function listOrderPlateDetail(string $status);

}
