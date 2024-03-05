<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "body"=>$this->faker->sentence(10),
            "user_id"=>$this->faker->numberBetween(1,10),
            "likes_count"=>$this->faker->numberBetween(0,10),
        ];
    }
}
