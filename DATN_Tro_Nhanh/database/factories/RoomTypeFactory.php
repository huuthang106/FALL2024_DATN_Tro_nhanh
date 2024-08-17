<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomType>
 */
class RoomTypeFactory extends Factory
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
            //
            'name' => ucfirst($name),
            'description' => $this->faker->sentence,
            'max_people' => $this->faker->numberBetween(1, 6),
            'area' => $this->faker->randomFloat(2, 10, 100),
            'slug' => Str::slug($name),
            'status' => $this->faker->boolean(80), // 80% là true
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
