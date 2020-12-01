<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequests extends FormRequest
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
            'category_product_name' => 'required',
            'category_product_desc' => 'required',
        ];
    }
     public function messages()
    {
        return [
        'category_product_name.required' => 'Tên danh mục không được bỏ trống',
        'category_product_desc.required' => 'Mô tả danh mục không được bỏ trống',
        ];
    }
}
