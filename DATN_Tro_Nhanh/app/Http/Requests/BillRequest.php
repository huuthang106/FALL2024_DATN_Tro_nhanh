<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'creator_id' => 'required|exists:users,id',
            'payer_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            // 'payment_date' => 'required|date|after_or_equal:today',
            'description' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'creator_id.required' => 'Người tạo là bắt buộc.',
            'creator_id.exists' => 'Người tạo không tồn tại trong hệ thống.',
            'payer_id.required' => 'Người thanh toán là bắt buộc.',
            'payer_id.exists' => 'Người thanh toán không tồn tại trong hệ thống.',
            'title.required' => 'Tiêu đề hóa đơn là bắt buộc.',
            'title.string' => 'Tiêu đề hóa đơn phải là chuỗi ký tự.',
            'title.max' => 'Tiêu đề hóa đơn không được vượt quá 255 ký tự.',
            'amount.required' => 'Số tiền là bắt buộc.',
            'amount.numeric' => 'Số tiền phải là một số hợp lệ.',
            'amount.min' => 'Số tiền không thể nhỏ hơn 0.',
            // 'payment_date.required' => 'Ngày thanh toán là bắt buộc.',
            // 'payment_date.date' => 'Ngày thanh toán phải là định dạng ngày hợp lệ.',
            // 'payment_date.after_or_equal' => 'Ngày thanh toán không hợp lệ.',
            'description.required' => 'Mô tả không được để trống.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.'
        ];
    }
}
