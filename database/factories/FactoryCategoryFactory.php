<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 *
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'category_id' => rand(1, 5),
            'title' => fake()->sentence(rand(15)),
            'short_content' => fake()->sentence(rand(15)),
            'content' => fake()->paragraph(rand(15)),

        ];
    }
}
