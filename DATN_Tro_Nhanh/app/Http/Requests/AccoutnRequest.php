<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccoutnRequest extends FormRequest
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
        return [
            'blockDays' => 'required|integer|min:1', // Yêu cầu trường blockDays phải là số nguyên và lớn hơn hoặc bằng 1
            'blockReason' => 'required|string', // Yêu cầu trường blockReason phải là chuỗi văn bản
        ];
    }
    
    public function messages()
    {
        return [
            'blockDays.required' => 'Số ngày khóa tài khoản là bắt buộc.',
            'blockDays.integer' => 'Số ngày khóa tài khoản phải là một số nguyên.',
            'blockDays.min' => 'Số ngày khóa tài khoản phải lớn hơn hoặc bằng 1.',
            'blockReason.required' => 'Lý do khóa tài khoản là bắt buộc.',
            'blockReason.string' => 'Lý do khóa tài khoản phải là một chuỗi văn bản.',
        ];
    }
    
}
