<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Blog;
use Faker\Factory as Faker;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

     
     
        $faker = Faker::create();

        // Lấy ID của user mẫu (giả sử bạn đã có ít nhất một user trong cơ sở dữ liệu)
        $userId = User::first()->id;

        // Tạo 10 dữ liệu mẫu cho bảng blogs
        foreach (range(1, 10) as $index) {
            Blog::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => $faker->boolean,
                'slug' => Str::slug($faker->sentence),
                'user_id' => $userId,
            ]);
        }
    }
}
