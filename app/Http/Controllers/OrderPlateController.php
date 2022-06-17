<?php

namespace App\Http\Controllers;

use App\Actions\DetailOrderPlate\CreateDetailOrderPlateActions;
use App\Actions\DetailOrderWarehouse\CreateDetailOrderWarehouseActions;
use App\Actions\OrderPlate\CreateOrderPlateActions;
use App\Actions\OrderPlate\UpdateOrderPlateActions;
use App\Actions\OrderWarehouse\CreateOrderWarehouseActions;
use App\Actions\Warehouse\UpdateWarehouseActions;
use App\BuyGateway\FarmersMarketBuy;
use App\Http\Requests\OrderPlate\IndexOrderPlateRequest;
use App\Repositories\OrderPlate\ColeccionsOrderPlateRepositories;
use App\Repositories\Recipe\ColeccionsRecipeRepositories;
use App\Repositories\Warehouse\ColeccionsWarehouseRepositories;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderPlateController extends Controller
{
    private ColeccionsRecipeRepositories $coleccionRecipe;
    private ColeccionsOrderPlateRepositories $coleccionOrderPlate;
    private ColeccionsWarehouseRepositories $coleccionWarehouse;
    private FarmersMarketBuy $getBuyGateway;

    public function __construct()
    {
        $this->coleccionRecipe = new ColeccionsRecipeRepositories;
        $this->coleccionOrderPlate = new ColeccionsOrderPlateRepositories;
        $this->coleccionWarehouse = new ColeccionsWarehouseRepositories;
        $this->getBuyGateway =new FarmersMarketBuy;

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
            ['data' =>  $createDetailOrderPlate,
            'staus' =>  "200" ],
            Response::HTTP_OK
        );
    }

    public function generateOrderWharehouse()
    {
        $orderPlates = $this->coleccionOrderPlate->listOrderPlateDetail("start");

        foreach($orderPlates as $orderPlate){

            $dataOrderWarehouse = [
                "order_plates_id" => $orderPlate->id,
                "status" => "start"
                ] ;

            $createOrderWarehouse = CreateOrderWarehouseActions::execute($dataOrderWarehouse);
            $listRecipesId = $this->coleccionRecipe->listRecipeId($orderPlate->recipes_id);

            foreach ($listRecipesId as $listRecipeId){

                $dataValidateProcessOrderPlates = [
                            "order_plate_id" => $orderPlate->id,
                            "list_recipe_id_quantity" => $listRecipeId->quantity,
                            "list_recipe_product_name" => $listRecipeId->product_name,
                            "order_warehouses_id" => $createOrderWarehouse->id,
                            "product_id" =>  $listRecipeId->product_id,
                            "list_recipe_quantity" => $listRecipeId->quantity
                ];
                $validateProcessOrderPlates = $this->validateProcessOrderPlates($dataValidateProcessOrderPlates);
            }
        }

        return response()->json(
            ['data' =>  $validateProcessOrderPlates,
            'staus' =>  "200" ],
            Response::HTTP_OK
        );
    }


    public function validateProcessOrderPlates(array $dataValidateProcessOrderPlates)
    {
        $quantityProductWarehouse =$this->coleccionWarehouse->quantityProductWarehouse($dataValidateProcessOrderPlates['list_recipe_quantity']);

        if($quantityProductWarehouse['quantity'] <= $dataValidateProcessOrderPlates['list_recipe_id_quantity']){

            $dataDetailOrderWarehouse = [
                "order_warehouses_id" => $dataValidateProcessOrderPlates['order_warehouses_id'],
                "product_id" =>  $dataValidateProcessOrderPlates['product_id'],
                "quantity" =>   $dataValidateProcessOrderPlates['list_recipe_id_quantity']
                ] ;

            $createOrderWarehouse = CreateDetailOrderWarehouseActions::execute($dataDetailOrderWarehouse);

            $resultQuantityWarehouse =  $quantityProductWarehouse['quantity'] - $dataValidateProcessOrderPlates['list_recipe_quantity'];

            $dataProcessOrder = [
                                "idWarehouse" => $quantityProductWarehouse['id'],
                                "quantityWarehouse" =>  $resultQuantityWarehouse,
                                "idOrderPlate" => $dataValidateProcessOrderPlates['order_plate_id'],
                                "statusOrderPlate" =>  "process"
                            ];
                            return [
                                "dataProcessOrder" =>  $dataProcessOrder
                            ];
          return  $this->updateProcessOrderPlates($dataProcessOrder);


        }else{
            $url ="https://recruitment.alegra.com/api/farmers-market/buy";
            $productName = $dataValidateProcessOrderPlates['list_recipe_product_name'];

            $buyProducQuantity = $this->getBuyGateway->buyProduct($url, $productName);

            $resultQuantityWarehouse =  $quantityProductWarehouse['quantity'] + $buyProducQuantity['quantitySold'];

            $dataProcessOrder = [
                "idWarehouse" =>   $quantityProductWarehouse['id'],
                "quantityWarehouse" =>  $resultQuantityWarehouse,
                "idOrderPlate" => $dataValidateProcessOrderPlates['order_plate_id'],
                "statusOrderPlate" =>  "dstart"
            ];

            return  $this->updateProcessOrderPlates($dataProcessOrder);

            return [
                "url" => $url,
            "productName" => $productName,
            "buyProducQuantity" => $buyProducQuantity,
            "dataProcessOrder" => $dataProcessOrder
            ];

        }
    }

    public function updateProcessOrderPlates(array $dataProcessOrder)
    {

        $dataUpdateWarehouse = [
            "id" =>  $dataProcessOrder["idWarehouse"],
            "quantity" => $dataProcessOrder["quantityWarehouse"]
            ];

        UpdateWarehouseActions::execute($dataUpdateWarehouse);

        $dataUpdateOrderPlate= [
        "id" => $dataProcessOrder["idOrderPlate"],
        "status" =>  $dataProcessOrder["statusOrderPlate"]
        ];
        UpdateOrderPlateActions::execute($dataUpdateOrderPlate);

    }



}
