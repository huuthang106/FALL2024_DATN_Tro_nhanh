<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ensure authorization is true if the user is allowed to create a blog
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'mimes:jpeg,png|max:2048', // Ensure images are JPEG or PNG and not larger than 2MB
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
            'images.*.required' => 'Vui lòng chọn ít nhất một ảnh.',
            'images.*.image' => 'Ảnh phải là một tập tin hình ảnh.',
            'images.*.mimes' => 'Chỉ được tải ảnh có định dạng JPG hoặc PNG.',
            'images.*.max' => 'Kích thước ảnh không được vượt quá 2MB.',
        ];
    }

    public function uploadImages()
    {
        $uploadedImages = [];

        if ($this->hasFile('images')) {
            foreach ($this->file('images') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('public/images', $filename);
                    $uploadedImages[] = $filename;
                }
            }
        }

        return $uploadedImages;
    }
}
