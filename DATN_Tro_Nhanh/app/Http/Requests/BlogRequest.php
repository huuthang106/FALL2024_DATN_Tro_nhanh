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
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Nội dung bình luận không được để trống.',
            'blog_slug.required' => 'Blog không hợp lệ.',
            'blog_slug.exists' => 'Blog không tồn tại.',
        ];
    }
}
