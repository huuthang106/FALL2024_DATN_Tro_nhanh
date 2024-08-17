<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class UpdatePasswordRequest extends FormRequest
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
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::min(8)->numbers(), 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }
       /**
     * Các thông điệp lỗi tùy chỉnh.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'current_password.required' => 'Mật khẩu cũ không được bỏ trống.',
            'current_password.current_password' => 'Mật khẩu cũ không chính xác.',
            'password.required' => 'Mật khẩu mới không được bỏ trống.',
            'password.min' => 'Mật khẩu mới phải dài hơn 8 ký tự.',
            // 'password.mixedCase' => 'Mật khẩu mới phải chứa cả chữ hoa và chữ thường.',
            'password.numbers' => 'Mật khẩu mới phải chứa ít nhất một số.',
            'password.confirmed' => 'Mật khẩu mới và xác nhận mật khẩu không khớp.',
            'password_confirmation.required' => 'Xác nhận mật khẩu không được bỏ trống.',
            'password_confirmation.same' => 'Xác nhận mật khẩu phải khớp với mật khẩu mới.',
        ];
    }
}
