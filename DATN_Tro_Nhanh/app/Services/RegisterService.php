<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class RegisterService
{
    protected const User = 1;
    /**
     * Validate and create a new user.
     *
     * @param array $data
     * @return \App\Models\User
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(array $data): User
    {
        // Create user with validated data
        return $this->create($data);
    }

    /**
     * Validate the user registration data.
     *
     * @param array $data
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validate(array $data): void
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * Create a new user instance.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => self::User,
        ]);

        // Tạo slug từ name và id sau khi tạo user
        $user->slug = Str::slug($user->name . '-' . $user->id);
        $user->save();

        return $user;
    }
}
