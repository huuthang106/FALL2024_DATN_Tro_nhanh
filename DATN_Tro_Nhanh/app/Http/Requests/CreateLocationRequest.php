<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Đảm bảo rằng yêu cầu được phép thực thi
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'type_vip' => 'required|integer|min:1',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên gói tin.',
            'name.string' => 'Tên phải là một chuỗi văn bản.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'type_vip.required' => 'Vui lòng chọn loại gói tin.',
            'type_vip.integer' => 'Loại phải là một số nguyên.',
            'type_vip.min' => 'Loại phải là một số nguyên từ 1 trở lên.',
            'status.required' => 'Vui lòng chọn trạng thái.',
        ];
    }
}
