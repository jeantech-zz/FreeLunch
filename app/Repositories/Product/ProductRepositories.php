<?php

namespace App\Repositories\Product;

interface ProductRepositories
{
    public function productId(string $nameProduct);

    public function listProducts();
}