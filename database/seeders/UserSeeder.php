<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "abdelhamed",
            "email" => "abdelhamed@bibalance.com",
            "password" => 2222634,
        ]);

        User::create([
            "name" => "baraa ossama",
            "email" => "baraa@bibalance.com",
            "password" => 123456789,

        ]);
        User::create([
            "name" => "Ahmed Ismail",
            "email" => "ahmedisamail@bibalance.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Mansour Essam",
            "email" => "mansour@bibalance.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Shehab Mohammed",
            "email" => "shehab@bibalance.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Khaled Nagah",
            "email" => "khaled@bibalance.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Shady Alaa",
            "email" => "shady@bibalance.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Omnia Elesawy",
            "email" => "omnia@bibalance.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Amany Abdelwahab",
            "email" => "amany@bibalance.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Shahd Hesham",
            "email" => "shahd@bibalance.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Ali",
            "email" => "ali@gmail.com",
            "password" => 123456789,
        ]);
        User::create([
            "name" => "Leo",
            "email" => "leo@gmail.com",
            "password" => 123456789,
        ]);
    }
}
