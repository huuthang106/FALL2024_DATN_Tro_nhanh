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
            'phone.numeric' => 'Số điện thoại phải là số.',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 chữ số.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 chữ số.',
           
        ];
    }
}
