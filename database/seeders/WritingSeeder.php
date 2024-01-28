<?php

namespace Database\Seeders;

use App\Models\Writing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WritingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Writing::create([
            "user_id" => 11,
            "body" => "Writings 1"
        ]);

        Writing::create([
            "user_id" => 11,
            "body" => "Writings 2"
        ]);
        Writing::create([
            "user_id" => 11,
            "body" => "Writings 3"
        ]);
        // User 2
        Writing::create([
            "user_id" => 12,
            "body" => "Writings 1"
        ]);

        Writing::create([
            "user_id" => 12,
            "body" => "Writings 2"
        ]);
        Writing::create([
            "user_id" => 12,
            "body" => "Writings 3"
        ]);
    }
}
