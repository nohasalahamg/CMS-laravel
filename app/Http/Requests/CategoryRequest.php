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
            'name' => 'required|max:255|min:3|unique:categories' 
            //
        ];
    }


    public function messages()
{
    return [
        'name.required' => 'The  Name is required',
        'name.unique' => 'The  Name is unique'
        
    ];
}


//public function attributes()
//{
   // return [
     //   'name' => 'Category Name',
   // ];}



}
