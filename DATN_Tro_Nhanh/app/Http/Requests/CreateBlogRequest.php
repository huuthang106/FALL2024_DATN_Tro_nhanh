<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'required', // Bắt buộc phải có ít nhất một ảnh
            'images.*' => 'mimes:jpeg,png,jpg|max:2048', // Kiểm tra định dạng và kích thước ảnh
        ];
    }
    
    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là một chuỗi văn bản.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.required' => 'Mô tả là bắt buộc.',
            'description.string' => 'Mô tả phải là một chuỗi văn bản.',
            'images.required' => 'Hãy tải lên hình ảnh để hoàn tất.', // Message for the 'required' rule for images
            'images.*.mimes' => 'Chỉ được tải ảnh có định dạng JPEG hoặc PNG.',
            'images.*.max' => 'Kích thước ảnh không được vượt quá 2MB.',
        ];
    }
    
}

