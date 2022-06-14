<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRecipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'product_id',
        'quantity',
    ];
}
