<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:news,name,'.($this->news ?? ''),
            'description' => 'required|min:2',
            'article' => 'required|min:2',
            'avatar' => ($this->news ? 'nullable' : 'required').'|image'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 2 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute phải là hình ảnh'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên bài viết',
            'description' => 'Mô tả bài viết',
            'article' => 'Nội dung bài viết',
            'avatar' => 'File upload'
        ];
    }
}
