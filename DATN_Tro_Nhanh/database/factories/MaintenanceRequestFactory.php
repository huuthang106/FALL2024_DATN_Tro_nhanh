<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\MaintenanceRequest;
use App\Models\Room;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaintenanceRequest>
 */
class MaintenanceRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = MaintenanceRequest::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence, // Tiêu đề yêu cầu bảo trì
            'description' => $this->faker->paragraph, // Nội dung yêu cầu bảo trì
            'room_id' => Room::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một ID từ bảng rooms
            'user_id' => User::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một ID từ bảng users
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
