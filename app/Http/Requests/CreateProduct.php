<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaSpaces;

class CreateProduct extends FormRequest
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
            'category_id' => ['required', 'numeric'],
            'product_name' => ['required', new AlphaSpaces],
            'price' => 'required|numeric',
            'image' => 'required|url',
            'quantity' => 'required|numeric',
            'avg_rating' => 'Nullable|numeric'

        ];
    }
}
