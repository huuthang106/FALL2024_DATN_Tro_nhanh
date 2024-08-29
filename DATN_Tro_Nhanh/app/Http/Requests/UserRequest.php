<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
            'user_slug' => 'required|string|exists:users,slug',
        ];
    }

    public function messages()
    {
        return [
            'rating.required' => 'Vui lòng chọn đánh giá.',
            'rating.integer' => 'Đánh giá phải là số nguyên.',
            'rating.min' => 'Đánh giá phải từ 1 đến 5 sao.',
            'rating.max' => 'Đánh giá phải từ 1 đến 5 sao.',
            'content.required' => 'Nội dung đánh giá không được để trống.',
            'user_slug.required' => 'Người dùng không hợp lệ.',
            'user_slug.exists' => 'Người dùng không tồn tại.',
        ];
    }
}
