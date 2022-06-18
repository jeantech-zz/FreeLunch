<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBuy extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'order_plates_id',
        'quantity_buys',
    ];
}
