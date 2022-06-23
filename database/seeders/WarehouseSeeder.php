<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use App\Repositories\Product\ColeccionsProductRepositories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    private ColeccionsProductRepositories $coleccionProduct;

    public function __construct()
    {
        $this->coleccionProduct = new ColeccionsProductRepositories;
    }


    public function run():void
    {
       $products = $this->coleccionProduct->listProducts();

        foreach ($products as $product) {
            Warehouse::create([
                'product_id' => $product->id,
                'quantity' => 5
            ]);
        }
    }
}
