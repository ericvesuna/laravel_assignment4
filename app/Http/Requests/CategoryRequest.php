<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name'=>'bail|required|alpha|unique:categories,category_name,'.$this->route('id'),
        ];
    }

    public function messages()
    {
        return [
        'required'=>'Please Enter Category Name',
        'category_name.unique'=>'Category Name Already Exists',
        'category_name.alpha'=>'Please Enter Only Alphabets',
        ];
    }
}
