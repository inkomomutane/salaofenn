<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class CreateService extends FormRequest
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
            'name'=>'required',
            'sub_category_id'=>'required',
            'price'=>'required',
            'promotion'=>'required',
            'published_at'=>'required'
        ];
    }
}