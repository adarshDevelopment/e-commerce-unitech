<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:categories'.(request()->method()== "POST" ? '' : ',name,'.$this->id),
            'slug' => 'required|unique:categories'.(request()->method()== "POST" ? '' : ',slug,'.$this->id),
            'status' => 'required',
            'rank' => 'required',
            'short_description' => 'required'
        ];
    }
}
