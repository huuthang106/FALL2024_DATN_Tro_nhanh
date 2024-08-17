<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'price_range' => $this->faker->randomElement(['0-1M', '1M-3M', '3M-5M', '5M+']), // Ví dụ các khoảng giá
            'status' => $this->faker->boolean,
            'deleted_at' => null, // Null vì soft deletes
        ];
    }
}
