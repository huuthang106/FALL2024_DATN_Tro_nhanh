<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Favourite;
use App\Models\Room;
use App\Models\Acreage;
use App\Models\Price;
use App\Models\Category;
use App\Models\PriceList;
use App\Models\Resident;
use App\Models\Payment;
use App\Models\MaintenanceRequest;
use App\Models\Watchlist;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Report;
use App\Models\Registrationlist;
use App\Models\Transaction;
use App\Models\Notification;
use App\Models\Contact;

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
        Contact::factory()->count(10)->create();

        // Tạo dữ liệu mẫu cho bảng Messages
        // Message::factory()->count(50)->create();
        User::factory(20)->create();
        // Acreage::factory(5)->create();
        // Category::factory(5)->create();
        // Location::factory(5)->create();
        // PriceList::factory(5)->create();
        // Price::factory(5)->create();
        // Zone::factory(5)->create();
        // Room::factory(5)->create();
        // Resident::factory(5)->create();
        // Payment::factory(5)->create();
        // Blog::factory(5)->create();
        // MaintenanceRequest::factory(5)->create();
        // Watchlist::factory(5)->create();
        // Comment::factory(5)->create();
        // RegistrationList::factory(5)->create();
        // Notification::factory(5)->create();
        // Transaction::factory(5)->create();
        // Report::factory(5)->create();
        // Favourite::factory(5)->create();
  
       
    }
}
