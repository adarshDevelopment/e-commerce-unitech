<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:attributes'.(request()->method()== "POST" ? '' : ',name,'.$this->id),
            'status' => 'required',
        ];
    }
}
