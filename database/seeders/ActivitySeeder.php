<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create([
            "level_id"=>1,
            "title"=>"yoga",
            "description"=>"adjust your body",
            "type"=>"physical",
        ]);
        Activity::create([
            "level_id"=>1,
            "title"=>"think",
            "description"=>"think Positively",
            "type"=>"mental",
        ]);
        Activity::create([
            "level_id"=>1,
            "title"=>"imagine ",
            "description"=>"imagine your are hero",
            "type"=>"emotional",
        ]);
        Activity::create([
            "level_id"=>1,
            "title"=>"ChatBot",
            "description"=>"use our chatbot",
            "type"=>"social",
        ]);
        // LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
        Activity::create([
            "level_id"=>2,
            "title"=>"Walk",
            "description"=>"Walk around 20 min",
            "type"=>"physical",
        ]);
        Activity::create([
            "level_id"=>2,
            "title"=>"Meditation",
            "description"=>"Make a Meditation",
            "type"=>"mental",
        ]);
        Activity::create([
            "level_id"=>2,
            "title"=>"Guess",
            "description"=>"guess something make you happy",
            "type"=>"emotional",
        ]);
        Activity::create([
            "level_id"=>2,
            "title"=>"call",
            "description"=>"call a friend",
            "type"=>"social",
        ]);
    }
}
