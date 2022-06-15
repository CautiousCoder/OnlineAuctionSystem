<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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
        $id = rand(100, 1000);
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        $image = "https://picsum.photos/id/" . $id . "/367/267";

        return [
            'title' => $title,
            'slug' => $slug,
            'image' => $image,
            'description' => $this->faker->text(300),
            'user_id' => 1,
        ];
    }
}
