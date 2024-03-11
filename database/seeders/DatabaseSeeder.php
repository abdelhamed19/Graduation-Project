<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Post;
use App\Models\User;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use Database\Seeders\DescriptionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(ActivitySeeder::class);
        //$this->call(TaskSeeder::class);
        //$this->call(WritingSeeder::class);
        Post::factory(10)->create();
        $this->call(PlanSeeder::class);
        //Article::factory(10)->create();
    }
}
