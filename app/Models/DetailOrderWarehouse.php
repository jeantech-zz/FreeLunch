<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrderWarehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_warehouses_id',
        "product_id",
        "quantity"
    ];
}
