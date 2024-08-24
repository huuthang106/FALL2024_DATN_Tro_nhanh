<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Report;
use App\Models\User;
use App\Models\Room;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{ protected $model = Report::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'description' => $this->faker->text, // Mô tả báo cáo
            'status' => $this->faker->boolean(80), // Trạng thái báo cáo, 80% là 1
            'user_id' => User::inRandomOrder()->first()->id, // ID của người dùng báo cáo
            'room_id' => $this->faker->boolean(50) ? Room::inRandomOrder()->first()->id : null, // ID của phòng (có thể null)
            'reported_person' => $this->faker->boolean(30) ? User::inRandomOrder()->first()->id : null, // ID của người bị báo cáo (có thể null)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
