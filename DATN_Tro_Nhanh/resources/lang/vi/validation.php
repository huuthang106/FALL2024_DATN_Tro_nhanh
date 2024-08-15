<?php
// Bắt Lỗi Đăng Nhập
return [
    'required' => ' :attribute là bắt buộc.',
    'string' => ' :attribute phải là chuỗi ký tự.',
    'email' => ' :attribute phải là định dạng email hợp lệ.',
    'confirmed' => ' :attribute không khớp với xác nhận.',
    'min' => [
        'string' => ' :attribute phải có ít nhất :min ký tự.',
    ],
    'max' => [
        'string' => ' :attribute không được vượt quá :max ký tự.',
    ],
    'unique' => ' :attribute đã được sử dụng.',
    'lowercase' => ' :attribute phải viết thường.',
    'regex' => ' :attribute không phù hợp.',
    'attributes' => [
        'name' => 'Họ và Tên',
        'email' => 'Email',
        'password' => 'Mật khẩu',
        'password_confirmation' => 'Xác nhận mật khẩu',
    ],
];
