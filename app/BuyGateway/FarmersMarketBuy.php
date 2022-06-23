<?php

namespace App\BuyGateway;

use Illuminate\Support\Facades\Http;

class FarmersMarketBuy implements BuyGatewayContract
{
    public function buyProduct(string $url, string $product)
    {
        $response = Http::get($url, [
            "ingredient" => $product
        ]);
        return json_decode($response->body(), true);
    }
}