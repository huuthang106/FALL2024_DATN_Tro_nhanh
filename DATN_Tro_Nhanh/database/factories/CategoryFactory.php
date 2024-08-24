<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->word,
            'status' => $this->faker->boolean(80),
            'parent_id' => null, // Hoặc set giá trị phù hợp nếu cần
            'slug' => $this->faker->unique()->slug, // Sử dụng unique để đảm bảo không trùng lặp
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
