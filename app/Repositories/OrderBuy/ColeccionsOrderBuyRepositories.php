<?php

namespace App\Repositories\OrderBuy;

use App\Models\OrderBuy;
use Illuminate\Database\Eloquent\Collection;

class ColeccionsOrderBuyRepositories implements OrderBuyRepositories
{
    public function listOrderBuy():Collection
    {
        return OrderBuy::get();

    }

}
