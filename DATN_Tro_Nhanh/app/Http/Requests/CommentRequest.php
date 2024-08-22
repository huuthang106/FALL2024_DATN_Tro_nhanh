<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'room_slug' => 'required|string|exists:rooms,slug',
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
            'room_slug.required' => 'Phòng không hợp lệ.',
            'room_slug.exists' => 'Phòng không tồn tại.',
        ];
    }
}
