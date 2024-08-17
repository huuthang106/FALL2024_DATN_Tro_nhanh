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
            'description' => 'required|string',
            'price' => 'required|numeric',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'view' => 'required|integer',
            'status' => 'required|integer',
            'user_id' => 'required|integer|exists:users,id',
            'acreages_id' => 'required|integer|exists:acreages,id',
            'price_id' => 'required|integer|exists:prices,id',
            'category_id' => 'required|integer|exists:categories,id',
            'location_id' => 'required|integer|exists:locations,id',
            'zone_id' => 'required|integer|exists:zones,id',
            'room_type_id' => 'required|integer|exists:room_types,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Quy tắc cho hình ảnh
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
            'price.required' => 'Vui lòng nhập giá',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'longitude.required' => 'Vui lòng nhập kinh độ',
            'latitude.required' => 'Vui lòng nhập vĩ độ',
            'view.required' => 'Vui lòng nhập số lượng view',
            'status.required' => 'Vui lòng nhập trạng thái',
            'user_id.required' => 'Vui lòng chọn người dùng',
            'user_id.exists' => 'Người dùng không tồn tại',
            'acreages_id.required' => 'Vui lòng chọn diện tích',
            'acreages_id.exists' => 'Diện tích không tồn tại',
            'price_id.required' => 'Vui lòng chọn giá',
            'price_id.exists' => 'Giá không tồn tại',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.exists' => 'Danh mục không tồn tại',
            'location_id.required' => 'Vui lòng chọn địa điểm',
            'location_id.exists' => 'Địa điểm không tồn tại',
            'zone_id.required' => 'Vui lòng chọn vùng',
            'zone_id.exists' => 'Vùng không tồn tại',
            'room_type_id.required' => 'Vui lòng chọn loại phòng',
            'room_type_id.exists' => 'Loại phòng không tồn tại',
            'images.*.image' => 'Tệp tải lên phải là hình ảnh.',
            'images.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, hoặc jpg.',
            'images.*.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
