<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',

            'email' => [

                'email',
                Rule::unique('users', 'email')->ignore($this->route('id')),
            ],
            'phone' => 'nullable|numeric|string',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'province' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'village' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'phone.numeric' => 'Số điện thoại phải là số.',


            'email.email' => 'Email không hợp lệ.',
            'image.image' => 'File phải là hình ảnh.',
            'image.mimes' => 'Ảnh chỉ hỗ trợ định dạng jpeg, png, jpg, gif, svg.',
        ];
    }
}
