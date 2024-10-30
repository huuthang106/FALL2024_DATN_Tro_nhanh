<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomOwnersRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Đảm bảo rằng yêu cầu được phép thực thi
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string', // Đảm bảo mô tả là bắt buộc
            'quantity' => 'required|integer|min:1', // Thêm quy tắc min
            'price' => 'required|numeric|min:0', // Thêm quy tắc min
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Chỉ cần một hình ảnh
            // Kiểm tra zone_id có tồn tại trong bảng zones
            'phone' => 'required|string|max:15|regex:/^0[0-9]{9}$/', // Kiểm tra số điện thoại
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'description.required' => 'Mô tả là bắt buộc.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá không được nhỏ hơn 0.',
            'image.required' => 'Vui lòng tải lên một hình ảnh.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'zone_id.required' => 'Zone ID là bắt buộc.',
            'zone_id.exists' => 'Zone ID không tồn tại.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại bắt đầu bằng 0 và có 10 chữ số.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
        ];
    }
}