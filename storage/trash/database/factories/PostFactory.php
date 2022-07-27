<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $title = fake()->title();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => function() {
                // return Categories::factory()->create()->id;
                // return factory(Categories::class)->create()->id;
                return Category::factory()->count(10)->for(Post::factory())->create();
            }
        ];
    }
}
