<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $category = Category::all()->random(3);
        // $tags = Tag::all()->random(4);
        // Post::all()->each(function ($user) use ($category) {
        //     $user->roles()->attach(
        //         $category->random(3)->pluck('id')->toArray()
        //     );
        // });
        // Post::all()->each(function ($user) use ($tags) {
        //     $user->roles()->attach(
        //         $tags->random(4)->pluck('id')->toArray()
        //     );
        // });

        Category::factory()->count(10)->create();
        Tag::factory()->count(10)->create();
        $category = Category::all()->random(3);
        $tag = Tag::all()->random(4);

        // Post::factory()
        //     ->hasAttached(
        //         Category::factory()
        //             ->count(3)
        //             ->state(function (array $attributes, Post $post) {
        //                 return ['title' => $post->title . ' Category'];
        //             }),
        //         ['active' => true]
        //     )
        //     ->create();
        Post::factory()
            ->count(3)
            ->hasAttached($category, ['category_id' => 1, 'post_id' => 1])
            ->hasAttached($tag, ['post_id' => 1, 'tag_id' => 1])
            ->create();
    }
}
