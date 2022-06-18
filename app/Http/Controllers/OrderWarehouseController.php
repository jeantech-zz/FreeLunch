<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderWarehouse\IndexOrderWarehouseRequest;
use App\Repositories\OrderWarehouse\ColeccionsOrderWarehouseRepositories;
use App\Models\OrderWarehouse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderWarehouseController extends Controller
{
    private ColeccionsOrderWarehouseRepositories $coleccionsOrderWarehouse;

    public function __construct()
    {
        $this->coleccionsOrderWarehouse = new ColeccionsOrderWarehouseRepositories;
    }

    public function index(IndexOrderWarehouseRequest $request)
    {

        $orderWarehouses = $this->coleccionsOrderWarehouse->listOrderWarehouse($request->json('status'));
        return response()->json(
            ['data' =>  $orderWarehouses  ],
            Response::HTTP_OK
        );
    }

}
