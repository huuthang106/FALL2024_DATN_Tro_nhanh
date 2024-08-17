<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Mã hóa mật khẩu
            'phone' => $this->faker->numerify('###########'), // Số điện thoại 13 ký tự
            'address' => $this->faker->address(),
            'role' => 1, // Đặt giá trị mặc định là 2
            'balanca' => $this->faker->randomFloat(2, 0, 10000), // Số dư ngẫu nhiên dưới dạng số thực
            'slug' => Str::slug($this->faker->name()),
            'token' => Str::random(60),
            'status' => $this->faker->boolean(), // Trạng thái là boolean
            'image' => $this->faker->imageUrl(),
            'identification_number' => $this->faker->numerify('#########'), // Chuỗi số ngẫu nhiên
            'provider' => null,
            'provider_id' => null,
            'provider_token' => null,
            'remember_token' => Str::random(10),
            'token' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
