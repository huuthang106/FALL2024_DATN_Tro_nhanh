<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
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
            'name' => $this->faker->city, // Tạo tên khu vực là tên thành phố ngẫu nhiên
            'status' => $this->faker->boolean,
            'deleted_at' => null, // Null vì sử dụng soft deletes
        ];
    }
}
