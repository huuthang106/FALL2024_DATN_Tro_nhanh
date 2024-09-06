<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rating' => 'integer|min:1|max:5',
            'content' => 'required|string',
            'blog_slug' => 'required|string|exists:blogs,slug',
            'images' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Nội dung bình luận không được để trống.',
            'blog_slug.required' => 'Blog không hợp lệ.',
            'blog_slug.exists' => 'Blog không tồn tại.',
            'images.required' => 'Vui lòng tải lên ít nhất một hình ảnh.',
            'images.*.image' => 'Tệp tải lên phải là hình ảnh.',
            'images.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.',
            'images.*.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
