<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequests extends FormRequest
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
        'product_name' => 'required|unique:tbl_product|max:50',
        'product_price' => 'required|regex:/^\d+(\.\d{0})?$/',
        'product_image' => 'required|image|file|max:8192',
        'product_desc' => 'required',
        'product_content' => 'required',
        ];
    }
    public function messages()
    {
        return [
        'product_name.required' => 'Tên sản phẩm không được bỏ trống',
        'product_price.required' => 'Giá sản phẩm không được bỏ trống',
        'product_image.required' => 'Hình ảnh sản phẩm không được bỏ trống',
        'product_desc.required' => 'Mô tả sản phẩm không được bỏ trống',
        'product_content.required' => 'Nội sản phẩm dung không được bỏ trống',

        'product_image.image' => 'File tải lên phải là file ảnh',
        'product_image.max' => 'Kích thước phải < 8MB',

        'product_name.unique' => 'Tên không được trùng',
        'product_price.regex' => 'Tiền không đúng định dạng, phải là số, không ký tự, VD: 500000 => đúng định dạng',
        'product_name.max' => 'Tên sản phẩm không quá 50 ký tự',

        ];
    }
}
