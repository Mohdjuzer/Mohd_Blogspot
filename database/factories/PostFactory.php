<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence();

        return [
            'image' => fake()->imageUrl(640, 480),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => implode("\n\n", fake()->paragraphs(5)),
            'category_id' => Category::inRandomOrder()->value('id'),
            'user_id' => User::inRandomOrder()->value('id'),
            'published_at' => fake()->optional()->dateTime(),
        ];
    }
}
