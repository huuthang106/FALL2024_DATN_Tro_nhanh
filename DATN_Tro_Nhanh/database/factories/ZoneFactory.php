<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Zone;
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

     protected $model = Zone::class;
    public function definition(): array
    {
    
        return [
            'name' => $this->faker->streetName,
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'village' => $this->faker->randomElement(['30592', '10283', '50621']), // Mã xã giống của user
            'district' => $this->faker->randomElement(['892', '250', '340']), // Mã huyện giống của user
            'province' => $this->faker->randomElement(['89', '34', '62']), // Mã tỉnh giống của user
            'longitude' => '105.317362', // Giá trị cố định cho kinh độ
            'latitude' => '105.317362', // Giá trị cố định cho vĩ độ
            'total_rooms' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->boolean(80), // 80% là trạng thái hoạt động (1)
            'slug' => Str::slug($this->faker->unique()->streetName),
            'user_id' => \App\Models\User::factory(), // Giả sử bảng `users` đã có factory
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
