<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BuyGateway\BuyGatewayContract;
use App\BuyGateway\FarmersMarketBuy;

class AppServiceProvider extends ServiceProvider
{
    public function register():void
    {
        //
    }

    public function boot():void
    {
        $this->app->bind(BuyGatewayContract::class, FarmersMarketBuy::class);
    }
}
