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
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Hoặc dùng Hash::make('password')
            'phone' => $this->faker->optional()->numerify('###########'), // Số điện thoại từ 10 đến 13 chữ số
            'address' => $this->faker->optional()->address,
            'role' => $this->faker->randomElement([1, 2, 0]), // 1: User, 0: Admin 2:owners
            'balance' => $this->faker->optional()->randomNumber(5),
            'token' => Str::random(10),
            'slug' => Str::slug($this->faker->unique()->name),
            'google_id' => $this->faker->optional()->uuid,
            'status' => $this->faker->boolean(80), // 80% là trạng thái hoạt động (1)
            'image' => $this->faker->optional()->imageUrl(),
            'identification_number' => $this->faker->optional()->regexify('[A-Za-z0-9]{10}'),
            'provider' => $this->faker->optional()->randomElement(['google', 'facebook']),
            'provider_id' => $this->faker->optional()->uuid,
            'provider_token' => $this->faker->optional()->sha256,
            'deleted_at' => null,
            'remember_token' => Str::random(10),
            'province' => '89', // Mã tỉnh
            'district' => '892', // Mã huyện
            'village' => '30592', // Mã xã
            'created_at' => now(),
            'updated_at' => now(),
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
