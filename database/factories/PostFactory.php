<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'user_id' => random_int(1, 2),
            'title' => $title,
            'url' => Str::slug($title),
            'excerpt' => $this->faker->paragraphs(1, true),
            'content' => $this->faker->paragraphs(10, true),
            'published_at' => $this->faker->dateTime('now'),
        ];
    }
}
