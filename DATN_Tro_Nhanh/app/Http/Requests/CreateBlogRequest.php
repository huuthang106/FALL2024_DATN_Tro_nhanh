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
        ];
    }
    public function uploadImage()
    {
        if ($this->hasFile('file')) {
            $file = $this->file('file');
            return $file->store('images', 'public'); // Save to the public/images directory
        }

        return null; // Return null if no file is uploaded
    }

}
