<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentBlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
        
            'content' => 'required|string',
            'blog_slug' => 'required|string|exists:blogs,slug',
            
          
           
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Nội dung bình luận không được để trống.',
            'blog_slug.required' => 'Blog không hợp lệ.',
            'blog_slug.exists' => 'Blog không tồn tại.',
           
        ];
    }
}
