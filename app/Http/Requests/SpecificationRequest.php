<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecificationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:specifications'.(request()->method()== "POST" ? '' : ',name,'.$this->id),
            'status' => 'required',
        ];
    }
}
