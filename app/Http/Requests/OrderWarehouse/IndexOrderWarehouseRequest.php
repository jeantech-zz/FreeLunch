<?php

namespace App\Http\Requests\OrderWarehouse; 

use Illuminate\Foundation\Http\FormRequest;

class IndexOrderWarehouseRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'status' => ['string', 'max:255'],
        ];
    }
}
