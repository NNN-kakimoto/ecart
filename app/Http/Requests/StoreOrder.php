<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address_name' => 'required|max:255',
            'zip_1' => 'required|digits:3',
            'zip_2' => 'required|digits:4',
            'pref' => 'required|max:4',
            'address_detail' => 'required|max:255',
            'address_building' => 'nullable'
        ];
    }

    public function messages(){
        return [
            'address_name.required' => '名前は必須です。';
        ]
    }
}
