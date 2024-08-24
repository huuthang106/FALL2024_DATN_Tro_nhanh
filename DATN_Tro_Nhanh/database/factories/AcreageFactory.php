<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acreage>
 */
class AcreageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word;
        return [
            'name' => $this->faker->word, // Tạo tên ngẫu nhiên
            'min_size' => $this->faker->randomNumber(2), // Số kích thước tối thiểu ngẫu nhiên
            'max_size' => $this->faker->randomNumber(3), // Số kích thước tối đa ngẫu nhiên
            'status' => $this->faker->boolean(80), // 80% là trạng thái hoạt động (1)
            'deleted_at' => null, // Không bị xóa mềm
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
