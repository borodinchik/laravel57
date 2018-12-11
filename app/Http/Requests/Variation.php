<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Variation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sku' => 'required|string',
            'image' => 'required|mimes:jpeg,jpg,png',
            'product_id' => 'required|numeric',
            'price' => 'required|between:0,99999.99',
            'in_stock' => 'required|numeric'
            ];
    }
}
