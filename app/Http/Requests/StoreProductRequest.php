<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:products,name,'.($this->product ?? ''),
            'idProductType' => 'required',
            'description' => 'required|min:2',
            'article' => 'required|min:2',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'img' => ($this->product ? 'nullable' : 'required').'|image'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 2 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'unique' => ':attribute đã tồn tại',
            'numeric' => ':attribute phải là một số nguyên',
            'image' => ':attribute phải là hình ảnh'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'idProductType' => 'Loại sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'article' => 'Bài viết',
            'quantity' => 'Số lượng sản phẩm',
            'price' => 'Giá sản phẩm',
            'img' => 'File upload'
        ];
    }
}
