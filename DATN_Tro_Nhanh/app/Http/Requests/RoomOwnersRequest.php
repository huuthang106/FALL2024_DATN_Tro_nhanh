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
            'price' => 'required|numeric|min:0', // Giá phải là số và không âm
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'acreage' => 'required|integer|min:1', // Diện tích phải là số nguyên và lớn hơn 0
            'quantity' => 'required|integer|min:1', // Số lượng phải là số nguyên và lớn hơn 0
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'view' => 'required|integer|min:0', // Số lượng view phải là số nguyên và không âm
            'status' => 'required|integer|in:0,1', // Trạng thái chỉ có giá trị 0 hoặc 1
            'user_id' => 'required|integer|exists:users,id',
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
            'price.numeric' => 'Giá phải là số',
            'price.min' => 'Giá không được âm',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'acreage.required' => 'Vui lòng nhập diện tích',
            'acreage.integer' => 'Diện tích phải là số nguyên',
            'acreage.min' => 'Diện tích phải lớn hơn 0',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'quantity.min' => 'Số lượng phải lớn hơn 0',
            'longitude.required' => 'Vui lòng nhập kinh độ',
            'longitude.numeric' => 'Kinh độ phải là số',
            'latitude.required' => 'Vui lòng nhập vĩ độ',
            'latitude.numeric' => 'Vĩ độ phải là số',
            'view.required' => 'Vui lòng nhập số lượng view',
            'view.integer' => 'Số lượng view phải là số nguyên',
            'view.min' => 'Số lượng view không được âm',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.integer' => 'Trạng thái phải là số nguyên',
            'status.in' => 'Trạng thái không hợp lệ',
            'user_id.required' => 'Vui lòng chọn người dùng',
            'user_id.exists' => 'Người dùng không tồn tại',
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
