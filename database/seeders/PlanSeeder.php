<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First Plan
        Plan::create([
            "name"=>"silver",
            "price"=>300,
            "day_period"=>90,
            "account"=>"unverified",
            "post_num"=>20,
            "coupon_num"=>5,
        ]);

        // Second Plan
        Plan::create([
            "name"=>"gold",
            "price"=>600,
            "day_period"=>180,
            "account"=>"unverified",
            "post_num"=>50,
            "coupon_num"=>15,
        ]);

        // Third Plan
        Plan::create([
            "name"=>"platinum",
            "price"=>1000,
            "day_period"=>365,
            "account"=>"verified",
            "post_num"=>20000,
            "coupon_num"=>20000,
        ]);
    }
}
