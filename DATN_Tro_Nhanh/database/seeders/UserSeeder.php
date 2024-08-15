<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'phone' => '1234567890123', 
                'address' => '123 Main St',
                'role' => 1, 
                'balance' => '1000.00', 
                'slug' => Str::slug('John Doe'),
                'token' => Str::random(60),
                'status' => 1, 
                'image' => 'path/to/image.jpg',
                'identification_number' => '123456789',
                'provider' => null,
                'provider_id' => null,
                'provider_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
