<?php

namespace Database\Factories;

use App\Models\Category;
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
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        // $user = User::count() >= 20 ? User::inRandomOrder()->first()->id : User::factory();
        // $category = Category::count() >= 7 ? Category::inRandomOrder()->first()->id : Category::factory();

        return [
            'title' => $title,
            'slug' => $slug,
            'image' => $this->faker->imageUrl(400, 300),
            'content' => $this->faker->text(300),
            'user_id' => 1,
        ];
    }
}
