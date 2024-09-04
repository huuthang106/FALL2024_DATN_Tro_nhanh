<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAcreageRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Đảm bảo rằng yêu cầu được phép thực thi
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'min_size' => 'required|numeric',
            'max_size' => 'required|numeric|gte:min_size', // Đảm bảo max_size lớn hơn hoặc bằng min_size
            'status' => 'required',
        ];
    }
    
    public function messages()
{
    return [
        'name.required' => 'Vui lòng nhập tên diện tích.',
        'name.string' => 'Tên phải là một chuỗi văn bản.',
        'name.max' => 'Tên không được vượt quá 255 ký tự.',
        'min_size.required' => 'Vui lòng nhập kích thước tối thiểu.',
        'min_size.numeric' => 'Kích thước tối thiểu phải là một số.',
        'max_size.required' => 'Vui lòng nhập kích thước tối đa.',
        'max_size.numeric' => 'Kích thước tối đa phải là một số.',
        'max_size.gte' => 'Kích thước tối đa phải lớn hơn hoặc bằng kích thước tối thiểu.', // Thông báo lỗi cho gte
        'status.required' => 'Vui lòng chọn trạng thái.',
    ];
}

}
