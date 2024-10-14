<?php

namespace Database\Factories;
use App\Models\Registrationlist;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrationList>
 */
class RegistrationlistFactory extends Factory
{ protected $model = Registrationlist::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name, // Tên người dùng
            'description' => $this->faker->text, // Mô tả
            'identification_number' => $this->faker->unique()->numerify('ID#####'), // Số định danh
            'gender' => $this->faker->boolean(50), // Giới tính (50% nam, 50% nữ)
            'status' => $this->faker->boolean(80), // Trạng thái (80% hoạt động)
            'user_id' => User::inRandomOrder()->first()->id, // ID của người dùng
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
