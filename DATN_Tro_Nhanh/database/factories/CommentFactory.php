<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\User;
use App\Models\Room;
use App\Models\Blog;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comment::class;
    public function definition(): array
    {   $user = User::inRandomOrder()->first();
        $room = Room::inRandomOrder()->first();
        $parentComment = Comment::inRandomOrder()->first();
        $blog = Blog::inRandomOrder()->first();

        return [
            'content' => $this->faker->text, // Nội dung bình luận
            'status' => $this->faker->boolean(80), // 80% xác suất trạng thái là 1
            'rating' => $this->faker->numberBetween(1, 5), // Đánh giá từ 1 đến 5
            'user_id' => $user ? $user->id : null, // ID của người dùng tạo bình luận
            'room_id' => $room ? $room->id : null, // ID của phòng (có thể null)
            'parent_id' => $this->faker->boolean(30) ? ($parentComment ? $parentComment->id : null) : null, // Bình luận cha (có thể null)
            'blog_id' => $blog ? $blog->id : null, // ID của blog (có thể null)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
