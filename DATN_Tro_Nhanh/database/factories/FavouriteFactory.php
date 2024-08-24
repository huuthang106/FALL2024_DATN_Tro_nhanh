<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Favourite;
use App\Models\User;
use App\Models\Room;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favourite>
 */
class FavouriteFactory extends Factory
{    protected $model = Favourite::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'slug' => $this->faker->unique()->slug, // Tạo slug duy nhất
            'user_id' => User::inRandomOrder()->first()->id, // ID của người dùng
            'room_id' => Room::inRandomOrder()->first()->id, // ID của phòng
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
