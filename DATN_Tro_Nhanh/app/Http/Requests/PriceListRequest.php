<?php

// app/Http/Requests/PriceListRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceListRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'location_id' => 'required|integer|exists:locations,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'duration_day' => 'required|integer|min:1',
            'status' => 'required',
        ];
    }
    

    public function messages()
    {
        return [
            'location_id.required' => 'Vị trí không được bỏ trống.',
            'price.required' => 'Giá không được bỏ trống.',
            'price.numeric' => 'Giá phải là số.',
            'price.min' => 'Giá không được nhỏ hơn 0.',
            'description.required' => 'Mô tả không được bỏ trống.',
            'duration_day.required' => 'Số ngày không được bỏ trống.',
            'duration_day.min' => 'Số ngày không nhỏ hơn 1.',
            'status.required' => 'Trạng thái không được bỏ trống.',
        ];
    }
}
