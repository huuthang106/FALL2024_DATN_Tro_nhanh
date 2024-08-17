<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zone>
 */
class ZoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->streetName;
        return [
            //
            'name' => $name,
            'description' => $this->faker->paragraph,
            'room_number' => $this->faker->numberBetween(1, 100),
            'address' => $this->faker->address,
            'village' => $this->faker->citySuffix,
            'district' => $this->faker->city,
            'province' => $this->faker->state,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'total_rooms' => $this->faker->numberBetween(50, 200),
            'status' => $this->faker->boolean,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'user_id' => \App\Models\User::factory(), // Liên kết với một user ngẫu nhiên
            'deleted_at' => null, // Null vì sử dụng soft deletes
        ];
    }
}
