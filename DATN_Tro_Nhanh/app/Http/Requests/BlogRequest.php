<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rating' => 'integer|min:1|max:5',
            'content' => 'required|string',
            'blog_slug' => 'required|string|exists:blogs,slug',
            'images' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Quy tắc xác thực ảnh
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Nội dung bình luận không được để trống.',
            'blog_slug.required' => 'Blog không hợp lệ.',
            'blog_slug.exists' => 'Blog không tồn tại.',
            'images.required' => 'Vui lòng tải lên ít nhất một hình ảnh.',
            'images.*.image' => 'Tệp tải lên phải là hình ảnh.',
            'images.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.',
            'images.*.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là một chuỗi văn bản.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.required' => 'Mô tả là bắt buộc.',
            'description.string' => 'Mô tả phải là một chuỗi văn bản.',
            'images.*.image' => 'Tệp tải lên phải là hình ảnh.',
            'images.*.mimes' => 'Chỉ được tải ảnh có định dạng JPG, PNG, GIF, SVG.',
            'images.*.max' => 'Kích thước ảnh không được vượt quá 2MB.',
        ];
    }
}
