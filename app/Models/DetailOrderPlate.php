<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrderPlate extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_plates_id',
        'recipes_id'
    ];
}

