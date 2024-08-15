<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginService
{
    /**
     * Validate login credentials.
     *
     * @param array $data
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateLogin(array $data): void
    {
        $validator = Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
