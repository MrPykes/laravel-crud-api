<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'images' => 'required|array',
            'images.*' => 'required|mimes:jpeg,jpg,png'
        ];
    }
    public function messages()
    {

        return  [
            'name.*' => 'invalid data',
            'images.*' => 'invalid data',
        ];
    }
}
