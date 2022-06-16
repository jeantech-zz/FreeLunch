<?php

namespace App\Http\Controllers;

use App\Actions\DetailOrderPlate\CreateDetailOrderPlateActions;
use App\Actions\OrderPlate\CreateOrderPlateActions;
use App\Http\Requests\OrderPlate\CreateOrderRequest;
use App\Http\Requests\OrderPlate\IndexOrderPlateRequest;
use App\Repositories\OrderPlate\ColeccionsOrderPlateRepositories;
use App\Repositories\Recipe\ColeccionsRecipeRepositories;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response;

class OrderPlateController extends Controller
{
    private ColeccionsRecipeRepositories $coleccionRecipe;
    private ColeccionsOrderPlateRepositories $coleccionOrderPlate;

    public function __construct()
    {
        $this->coleccionRecipe = new ColeccionsRecipeRepositories;
        $this->coleccionOrderPlate = new ColeccionsOrderPlateRepositories;
    }

    public function index(IndexOrderPlateRequest $request)
    {

        $orderPlate = $this->coleccionOrderPlate->listOrderPlate($request->json('status'));
        return response()->json(
            ['data' =>  $orderPlate  ],
            Response::HTTP_OK
        );
    }

    public function generatePlates(int $countPlate):array
    {
        $arrayPlates = [];

        for($i=0; $i<$countPlate; $i++){
            $arrayPlates [$i] = $this->coleccionRecipe->generatePlate($countPlate);
        }

        return $arrayPlates;
    }

    public function createOrderPlate(Request $request)
    {
        $countPlate = $request->json('countOrder');


        $orderPlate = [
            "quantity" => $countPlate,
            "status" => "start"
            ] ;

        $createOrderPlate = CreateOrderPlateActions::execute($orderPlate);

        $arrayPlates = $this->generatePlates($countPlate);

        for( $i=0; $i<count( $arrayPlates);$i++){

            $detailOrderPlate = [
                "order_plates_id" => $createOrderPlate->id,
                "recipes_id" => $arrayPlates[$i]
                ] ;

            $createDetailOrderPlate = CreateDetailOrderPlateActions::execute($detailOrderPlate);
        }

        return response()->json(
            ['data' =>  $createDetailOrderPlate ],
            Response::HTTP_OK
        );
    }

    public function generatePlate(Request $request)
    {
        $arrayPlates = [];

        $countPlate = $request->json('countOrder');

        for($i=0; $i<$countPlate; $i++){
            $arrayPlates [$i] = $this->coleccionRecipe->generatePlate($countPlate);
        }
        return response()->json(
            ['data' =>  $arrayPlates ],
            Response::HTTP_OK
        );
    }




}
