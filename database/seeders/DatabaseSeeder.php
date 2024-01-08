<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name"=>"Abdelhamed",
            "email"=>"abdelhamed@gmail.com",
            "password"=>123456789,
            ]);

            User::create([
                "name"=>"Ahmed",
                "email"=>"ahmed@gmail.com",
                "password"=>123456789,
                ]);
        $this->call(LevelSeeder::class);
        $this->call(ActivitySeeder::class);
    }
}
