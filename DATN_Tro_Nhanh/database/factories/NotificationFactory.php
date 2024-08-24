<?php

namespace Database\Factories;
use App\Models\Notification;
use App\Models\User;
use App\Models\Room;
use App\Models\Comment;
use App\Models\Watchlist;
use App\Models\RegistrationList;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{    protected $model = Notification::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        if (!$user) {
            return []; // Không tạo thông báo nếu không có user
        }

        $room = $this->faker->boolean(50) ? Room::inRandomOrder()->first() : null;
        $comment = $this->faker->boolean(30) ? Comment::inRandomOrder()->first() : null;
        $watchlist = $this->faker->boolean(30) ? Watchlist::inRandomOrder()->first() : null;
        $registrationList = $this->faker->boolean(20) ? RegistrationList::inRandomOrder()->first() : null;
        $blog = $this->faker->boolean(50) ? Blog::inRandomOrder()->first() : null;

        return [
            'type' => $this->faker->word,
            'data' => $this->faker->text,
            'status' => $this->faker->boolean(80),
            'blog_id' => $blog ? $blog->id : null,
            'user_id' => $user->id,
            'room_id' => $room ? $room->id : null,
            'comment_id' => $comment ? $comment->id : null,
            'watchlist_id' => $watchlist ? $watchlist->id : null,
            'registration_list_id' => $registrationList ? $registrationList->id : null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
