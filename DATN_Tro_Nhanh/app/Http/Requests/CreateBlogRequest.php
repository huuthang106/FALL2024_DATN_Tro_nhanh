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
            'images' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Ensure images are JPEG or PNG and not larger than 2MB
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
            'images.required' => 'Vui lòng tải lên ít nhất một hình ảnh.',
            'images.*.image' => 'Tệp tải lên phải là hình ảnh.',
            'images.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.',
            'images.*.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
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
