<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:permissions,name,'.($this->permission ?? ''),
            'key_code' => 'required|min:2|max:255|unique:permissions,key_code,'.($this->permission ?? ''),
            'parent_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 2 kí tự',
            'max' => ':attribute tối đa có 255 kí tự',
            'unique' => ':attribute đã tồn tại'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Quyền',
            'key_code' => 'key code',
            'parent_id' => 'parent id'
        ];
    }
}
