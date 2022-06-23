<?php

namespace App\BuyGateway;

interface BuyGatewayContract
{   
    public function buyProduct(string $url, string $product);
}