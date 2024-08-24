<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Watchlist;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Watchlist>
 */
class WatchlistFactory extends Factory
{
    protected $model = Watchlist::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'status' => $this->faker->boolean(80), // 80% xác suất trạng thái là 1
            'user_id' => User::inRandomOrder()->first()->id, // ID của người dùng tạo danh sách
            'follower' => User::inRandomOrder()->where('id', '!=', User::inRandomOrder()->first()->id)->first()->id, // ID của người dùng được theo dõi (khác với người tạo danh sách)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
