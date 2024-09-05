<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Đảm bảo rằng yêu cầu được phép thực thi
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'quantity' => 'required|integer',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'view' => 'required|integer',
            'status' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'images' => 'required|array', // Ensure images are uploaded
             'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'price.required' => 'Vui lòng nhập giá',
            'description.required' => 'Vui lòng nhập mô tả',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng địa chỉ',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'longitude.required' => 'Vui lòng nhập kinh độ',
            'latitude.required' => 'Vui lòng nhập vĩ độ',
            'images.required' => 'Vui lòng tải lên ít nhất một hình ảnh', // Custom message for image requirement
            'images.*.required' => 'Tất cả các tập tin phải là hình ảnh', // Handle each image being required
            'images.*.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg',
            'images.*.max' => 'Kích thước hình ảnh không được vượt quá 2MB',
        ];
    }
}
