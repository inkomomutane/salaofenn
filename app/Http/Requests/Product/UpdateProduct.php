<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'id'=>'required',
            'sub_category_id' =>'required',
            'fornecedor_id' =>'required',
            'name' =>'required',
            'description'=>'required',
            'price'=>'required',
            'sellable' =>'required',
            'published_at' =>'required',
            'quantity' =>'required',
            'actual_stock'=>'required',
            'reserved_stock' =>'required',
            'free_stock'=>'required',
            'max_stock'=>'required',
            'min_stock'=>'required',
            'imposto' =>'required'
        ];
    }
}