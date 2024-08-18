<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\RoomType;
use App\Models\Acreage;
use App\Models\Price;
use App\Models\Category;
use App\Models\Area;
use App\Models\Location;
use App\Models\Zone;
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
        // RoomType::factory()->count(10)->create(); // Tạo 10 mẫu RoomType
        // Acreage::factory()->count(10)->create(); // Seed 10 dòng dữ liệu vào bảng acreages
        // Price::factory()->count(10)->create(); // Seed 10 dòng dữ liệu vào bảng prices
        // // Seed danh mục không có parent_id
        // Category::factory()->count(5)->create();

        // // Seed danh mục con (có parent_id)
        // Category::factory()->count(5)->create([
        //     'parent_id' => Category::inRandomOrder()->first()->id,
        // ]);
        // Area::factory()->count(10)->create(); // Seed 10 dòng dữ liệu vào bảng areas
        // Location::factory()->count(10)->create(); // Seed 10 dòng dữ liệu vào bảng locations
        // Zone::factory()->count(10)->create(); // Seed 10 dòng dữ liệu vào bảng zones
    }
}
