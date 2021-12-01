<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(4);
        return [
            'category_id' => Category::factory(),
            'title' => $title,
            'excerpt' => $this->faker->paragraphs(1, true),
            'content' => $this->faker->paragraphs(10, true),
            'published_at' => $this->faker->dateTime('now'),
        ];
    }
}
