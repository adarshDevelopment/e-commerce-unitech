<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
            'name' => 'required|unique:subcategories'.(request()->method() == "POST" ? '' : ',name,'.$this->id),
            'slug' => 'required|unique:subcategories'.(request()->method() == "POST" ? '' : ',slug,'.$this->id),
            'short_description'=> 'required',
            'category_id',
            'status'=> 'required',
        ];
    }
}
