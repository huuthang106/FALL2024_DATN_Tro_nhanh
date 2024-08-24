<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Room::class;
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'phone' => substr($this->faker->phoneNumber, 0, 13),
            'address' => $this->faker->address,
            'quantity' => $this->faker->numberBetween(1, 10),
            'longitude' => '105.317362', // Giá trị cố định giống như zone
            'latitude' => '105.317362', // Giá trị cố định giống như zone
            'view' => $this->faker->numberBetween(0, 1000),
            'slug' => Str::slug($this->faker->unique()->sentence(3)),
            'status' => $this->faker->boolean(80), // 80% là trạng thái hoạt động (1)
            'user_id' => \App\Models\User::factory(), // Giả sử bảng `users` đã có factory
            'acreages_id' => \App\Models\Acreage::factory(),
            'price_id' => \App\Models\Price::factory(),
            'category_id' => \App\Models\Category::factory(),

            'location_id' => \App\Models\Location::factory(),
            'zone_id' => \App\Models\Zone::factory(),

            'tenant_id' => \App\Models\User::factory(),
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
