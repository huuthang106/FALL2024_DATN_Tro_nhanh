<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            //
            'name' => $this->faker->word,
            'min_size' => $this->faker->numberBetween(10, 50), // Ví dụ kích thước từ 10 đến 50
            'max_size' => $this->faker->numberBetween(51, 100), // Ví dụ kích thước từ 51 đến 100
            'status' => $this->faker->boolean,
            'deleted_at' => null, // Nếu bạn muốn soft delete thì có thể thêm các logic vào đây
        ];
    }
}
