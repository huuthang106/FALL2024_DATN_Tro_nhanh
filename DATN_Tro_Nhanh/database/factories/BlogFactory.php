<?php

namespace Database\Factories;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Blog::class;
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence, // Tiêu đề blog
            'description' => $this->faker->paragraph, // Nội dung blog
            'status' => $this->faker->boolean(80), // Trạng thái hoạt động, 80% là true
            'slug' => $this->faker->unique()->slug, // Slug duy nhất từ tiêu đề
            'user_id' => User::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một ID từ bảng users
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
