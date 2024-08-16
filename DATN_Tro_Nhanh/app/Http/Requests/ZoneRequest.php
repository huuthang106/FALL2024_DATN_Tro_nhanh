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
            'description'=>'required|string',
            'total_rooms' => 'required|integer',
            'address' => 'required|string|max:255',
            'province' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'description.required' => 'Mô tả là bắt buộc.',
            'total_rooms.required' => 'Số phòng là bắt buộc.',
            'total_rooms.integer' => 'Trường này phải là số.',
            'province.required' => 'Địa chỉ là bắt buộc',
            'address.required' => 'Địa chỉ là bắt buộc',
            'district.required' => 'Địa chỉ là bắt buộc',
            'village.required' => 'Địa chỉ là bắt buộc',
            'latitude.required' => 'Địa chỉ là bắt buộc',
            'longitude.required' => 'Địa chỉ là bắt buộc',
            // Thêm các thông báo lỗi tùy chỉnh khác nếu cần
        ];
    }
}
