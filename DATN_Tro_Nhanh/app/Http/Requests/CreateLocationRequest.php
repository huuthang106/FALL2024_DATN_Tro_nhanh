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
            'end_date' => [
                'required',
                'date_format:Y-m-d',
                function ($attribute, $value, $fail) {
                    $currentDate = now()->format('Y-m-d');
                    if ($value <= $currentDate) {
                        $fail('Ngày hết hạn phải lớn hơn ngày hiện tại.');
                    }
                },
            ],
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên gói tin.',
            'name.string' => 'Tên phải là một chuỗi văn bản.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'end_date.required' => 'Vui lòng nhập ngày kết thúc.',
            'status.required' => 'Vui lòng chọn trạng thái.',
        ];
    }
}
