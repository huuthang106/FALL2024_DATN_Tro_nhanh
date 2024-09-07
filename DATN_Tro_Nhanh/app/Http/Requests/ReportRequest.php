<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'description' => 'required|string|max:1000',
            'status' => 'required|integer|in:1,2,3',
            'reported_person' => 'required|exists:users,id',
            // room_id là bắt buộc nếu không có zone_id
            'room_id' => 'required_without:zone_id|exists:rooms,id',
            // zone_id là bắt buộc nếu không có room_id
            'zone_id' => 'required_without:room_id|exists:zones,id',
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'Vui lòng nhập nội dung báo cáo.',
            'description.string' => 'Nội dung báo cáo phải là chuỗi ký tự.',
            'description.max' => 'Nội dung báo cáo không được vượt quá 1000 ký tự.',
        ];
    }
    public function withValidator($validator)
    {
        // chỉ được phép cung cấp một trong hai trường room_id hoặc zone_id, và không được phép điền cả hai
        $validator->after(function ($validator) {
            if ($this->filled('room_id') && $this->filled('zone_id')) {
                $validator->errors()->add('general', 'Chỉ được cung cấp một trong hai trường room_id hoặc zone_id.');
            }
        });
    }
}
