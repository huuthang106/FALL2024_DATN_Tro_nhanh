<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\PriceList;
use App\Models\Location; // Thêm dòng này nếu cần lấy ID location
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PriceList>
 */
class PriceListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PriceList::class;
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 50, 500), // Số tiền từ 50 đến 500
            'description' => $this->faker->sentence, // Mô tả ngắn gọn
            'duration_day' => $this->faker->numberBetween(1, 365), // Số ngày từ 1 đến 365
            'status' => $this->faker->boolean(80), // 80% trạng thái hoạt động
            'location_id' => Location::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một ID từ bảng locations
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
