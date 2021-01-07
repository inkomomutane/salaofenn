<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrder extends FormRequest
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
            'client_name' => 'required',
            'product_or_service_name'=>'required',
            'quantity'=>'required',
            'total_price' =>'required',
            'maded_by'=>'required',
            'user_id' =>'required',
            'payment_id' =>'required' 
        ];
    }
}