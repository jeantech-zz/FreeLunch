<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ColeccionsProductRepositories implements ProductRepositories
{
    public function productId(string $nameProduct):int
    {        
        $product = Product::where('name',$nameProduct) ->first();
        return   $product->id;
    }

    public function listProducts():collection
    {        
        return    Product::get();
    }

}