<?php

namespace App\Http\Controllers;

use App\Repositories\OrderBuy\ColeccionsOrderBuyRepositories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OrderBuyController extends Controller
{
    private ColeccionsOrderBuyRepositories $coleccionOrderBuy;

    public function __construct()
    {
        $this->coleccionOrderBuy = new ColeccionsOrderBuyRepositories;
    }

    public function index():Collection
    {
      return $this->coleccionOrderBuy->listOrderBuy();
    }

}
