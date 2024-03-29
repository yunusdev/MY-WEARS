<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            //
        //            'name' => 'required|max:100|unique:products',
            'name' => 'required|max:100',
            'class' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'price' => 'required',
            'available_sizes' => 'required|array|min:1',
            'available_colors' => 'required|array|min:1',
            'images' => 'required|array|min:1',
            'front_image' => 'required',
            'description' => 'required',
        ];
    }
}
