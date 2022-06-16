<?php

namespace App\Http\Requests\OrderPlate;

use Illuminate\Foundation\Http\FormRequest;

class IndexOrderPlateRequest extends FormRequest
{

    public function authorize():bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => ['string', 'max:255'],
        ];
    }
}
