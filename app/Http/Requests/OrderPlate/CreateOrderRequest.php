<?php

namespace App\Http\Requests\OrderPlate;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'countOrder' => ['required','int'],
        ];
    }
}
