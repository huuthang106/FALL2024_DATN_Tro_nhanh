<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'CCCDMT' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'CCCDMS' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'FileFace' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'CCCDMT.required' => 'Ảnh CMT/CCCD mặt trước là bắt buộc.',
            'CCCDMT.image' => 'Ảnh CMT/CCCD mặt trước phải là một hình ảnh.',
            'CCCDMS.required' => 'Ảnh CMT/CCCD mặt sau là bắt buộc.',
            'CCCDMS.image' => 'Ảnh CMT/CCCD mặt sau phải là một hình ảnh.',
            'FileFace.required' => 'Ảnh khuôn mặt là bắt buộc.',
            'FileFace.image' => 'Ảnh khuôn mặt phải là một hình ảnh.',
        ];
    }
}
