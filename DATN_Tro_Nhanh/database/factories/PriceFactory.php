<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Price;
use Illuminate\Support\Str;
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
    protected $model = Price::class;
    public function definition(): array
    {
        $minPrice = $this->faker->numberBetween(500000, 5000000); // Tạo giá nhỏ nhất
        $maxPrice = $this->faker->numberBetween($minPrice + 100000, $minPrice + 5000000); // Tạo giá lớn nhất

        return [
            'price_range' => $minPrice . ' - ' . $maxPrice . ' VND',
            'status' => $this->faker->boolean(80), // 80% là trạng thái hoạt động (1)
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
