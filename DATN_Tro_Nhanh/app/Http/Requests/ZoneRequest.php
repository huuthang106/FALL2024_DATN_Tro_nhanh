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
        // Quy tắc bắt buộc khi tạo mới
        $rules = [
           
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string|max:255',
            'province' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'phone' => 'required|numeric|digits_between:10,11|regex:/^0[0-9]{9}$/',
            // 'acreage' => 'required|numeric|min:1',
            'price' => 'required|min:1',
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Bắt buộc cho mỗi hình ảnh
        ];
    
        // Nếu đây là yêu cầu sửa đổi, các trường có thể là nullable
        if ($this->isMethod('put')) {
            $rules = [
              
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'nullable|exists:categories,id',
                'address' => 'nullable|string|max:255',
                'province' => 'nullable|string',
                'district' => 'nullable|string',
                'village' => 'nullable|string',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',
                'phone' => 'required|numeric|digits_between:10,11|regex:/^0[0-9]{9}$/', // Đảm bảo rằng số điện thoại là bắt buộc
                // 'acreage' => 'nullable|numeric|min:1',
                'price' => 'nullable|numeric|min:1',
                'image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Không bắt buộc cho mỗi hình ảnh
               
                
            ];
        }
    
        return $rules;
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'title.required' => 'Tiêu đề là bắt buộc.',
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
            'phone.max' => 'Số điện thoại không được vượt quá 10 chữ số.',
            'acreage.required' => 'Diện tích là bắt buộc.',
            'acreage.numeric' => 'Diện tích phải là số.',
            'acreage.min' => 'Diện tích phải lớn hơn 0 m².',
            'price.required' => 'Giá là bắt buộc.',
           
            'price.min' => 'Giá phải lớn hơn 0 VND.',
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.image' => 'File phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'phone.digits_between' => 'Số điện thoại không hợp lệ.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
        ];
        
    }
}
