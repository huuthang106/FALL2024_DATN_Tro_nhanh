<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Room;
use App\Models\Zone;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Resident::class;
    public function definition(): array
    {
        $userId = User::inRandomOrder()->first()->id;

        // Chọn ngẫu nhiên một room
        $room = Room::inRandomOrder()->first();
        $roomId = $room->id;

        // Kiểm tra xem room có zone_id không
        $zoneId = $room->zone_id ? $room->zone_id : Zone::inRandomOrder()->first()->id;


        return [
            //

            'user_id' => $userId,
            'room_id' => $roomId,
            'zone_id' => $zoneId,
            'status' => $this->faker->boolean, // Trạng thái cư dân
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Ngày bắt đầu trong 1 năm qua
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'), // Ngày kết thúc trong 1 năm tới
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
