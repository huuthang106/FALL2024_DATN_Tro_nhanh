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
            
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên gói tin.',
            'name.string' => 'Tên phải là một chuỗi văn bản.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
          
            'status.required' => 'Vui lòng chọn trạng thái.',
        ];
    }
}
