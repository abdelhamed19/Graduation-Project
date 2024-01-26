<?php

namespace Database\Seeders;

use App\Models\{Role,User};
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "role" => "super-admin",
            "user_id" => 1,
            "username"=>User::find(1)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 2,
            "username"=>User::find(2)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 3,
            "username"=>User::find(3)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 4,
            "username"=>User::find(4)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 5,
            "username"=>User::find(5)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 6,
            "username"=>User::find(6)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 7,
            "username"=>User::find(7)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 8,
            "username"=>User::find(8)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 9,
            "username"=>User::find(9)->name
        ]);
        Role::create([
            "role" => "admin",
            "user_id" => 10,
            "username"=>User::find(10)->name
        ]);
        // Role::create([
        //     "user_id" => 11,
        //     "username"=>User::find(11)->name
        // ]);
        // Role::create([
        //     "user_id" => 12,
        //     "username"=>User::find(12)->name
        // ]);
    }
}
