<?php

return [
    'paths' => ['api/*'], // Đường dẫn mà bạn muốn áp dụng CORS
    'allowed_methods' => ['*'], // Các phương thức HTTP được phép
    'allowed_origins' => [
        'https://h5.zdn.vn', // Miền đầu tiên
        'zbrowser://h5.zdn.vn',
        'http://localhost:3002',
        'http://localhost:3000',
        'https://localhost:3000',
        'http://localhost:3001' // Miền thứ hai
    ],
    'allowed_headers' => ['*'], // Các tiêu đề được phép
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
