<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRatingRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'number' => 'required|digits_between:1,5',
            'content' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 2 kí tự',
            'max' => ':attribute tối đa có 255 kí tự',
            'digits_between' => ':attribute phải từ 8-13 số',
            'number.required' => 'Bạn chưa đánh giá sản phẩm',
            'number.digits_between' => 'Bạn chưa đánh giá sản phẩm'
        ];
    }

    public function attributes() 
    {
        return [
            'name' => 'Tên người mua hàng',
            'email' => 'Địa chỉ email',
            'content' => 'Nội dung đánh giá'
        ];
    }
}
