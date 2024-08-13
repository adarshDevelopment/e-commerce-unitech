<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressTypeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:address_types'.(request()->method()== "POST" ? '' : ',name,'.$this->id),
            'status' => 'required',
        ];
    }
}
