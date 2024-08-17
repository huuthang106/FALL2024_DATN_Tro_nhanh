<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->city;
        return [
            //
            'name' => $name,
            'status' => $this->faker->boolean,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 1000), // Tạo slug kết hợp với số ngẫu nhiên
            'end_date' => $this->faker->dateTimeBetween('now', '+2 years'), // Thời điểm kết thúc ngẫu nhiên trong vòng 2 năm tới
            'deleted_at' => null, // Null vì sử dụng soft deletes
        ];
    }
}
