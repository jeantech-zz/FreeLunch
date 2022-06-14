<?php

namespace App\Repositories\Product;

use App\Models\Product;

class ColeccionsProductRepositories implements ProductRepositories
{
    public function productId(string $nameProduct):int
    {        
        $product = Product::where('name',$nameProduct) ->first();
        return   $product->id;
    }

}