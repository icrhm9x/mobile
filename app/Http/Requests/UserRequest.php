<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'.($this->id ?? ''),
            'phone' => 'required|digits_between:8,13'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 2 kí tự',
            'max' => ':attribute tối đa có 255 kí tự',
            'email' => ':attribute không đúng định dạng',
            'unique' => ':attribute đã tồn tại',
            'digits_between' => ':attribute phải từ 8-13 số'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Địa chỉ email',
            'phone' => 'Số điện thoại',
        ];
    }
}
