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
            'status' => 'required|numeric',
            'total_rooms' => 'required|integer',
            'address' => 'required|string|max:255',
            'province' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',

            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'description.required' => 'Mô tả là bắt buộc.',
            'status.required' => 'Phần này là bắt buộc.',
            'total_rooms.required' => 'Số phòng là bắt buộc.',
            'total_rooms.integer' => 'Trường này phải là số.',
            'province.required' => 'Địa chỉ là bắt buộc',
            'address.required' => 'Địa chỉ là bắt buộc',
            'district.required' => 'Địa chỉ là bắt buộc',
            'village.required' => 'Địa chỉ là bắt buộc',
            'latitude.required' => 'Địa chỉ là bắt buộc',
            'longitude.required' => 'Địa chỉ là bắt buộc',

            'images.required' => 'Vui lòng tải lên ít nhất một hình ảnh.',
            'images.array' => 'Hình ảnh phải là một mảng.',

            'images.min' => 'Bạn phải tải lên ít nhất một hình ảnh.',
            'images.*.image' => 'Tệp tải lên phải là hình ảnh.',
            'images.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.',
            'images.*.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
