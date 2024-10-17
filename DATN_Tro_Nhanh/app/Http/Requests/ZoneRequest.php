<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string|max:255',
            'province' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'phone' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Chỉ cần một hình ảnh
            'price' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'description.required' => 'Mô tả là bắt buộc.',
            'category_id.required' => 'Loại phòng là bắt buộc.',
            'province.required' => 'Địa chỉ là bắt buộc',
            'address.required' => 'Địa chỉ là bắt buộc',
            'district.required' => 'Địa chỉ là bắt buộc',
            'village.required' => 'Địa chỉ là bắt buộc',
            'latitude.required' => 'Địa chỉ là bắt buộc',
            'longitude.required' => 'Địa chỉ là bắt buộc',
            'phone.required' => 'Số điện thoại là bắt buộc',
            'image.required' => 'Vui lòng tải lên một hình ảnh.', // Cập nhật thông báo cho hình ảnh
            'image.image' => 'Tệp tải lên phải là hình ảnh.', // Cập nhật thông báo cho hình ảnh
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.', // Cập nhật thông báo cho hình ảnh
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.', // Cập nhật thông báo cho hình ảnh
            'price.required' => 'Giá là bắt buộc',
        ];
    }
}
