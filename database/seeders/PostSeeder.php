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
        Category::factory()->count(10)->create();
        Tag::factory()->count(10)->create();
        $category = Category::all()->random(3);
        $tag = Tag::all()->random(4);
        Post::factory()
            ->count(3)
            ->hasAttached($category, ['category_id' => 1, 'post_id' => 1])
            ->hasAttached($tag, ['post_id' => 1, 'tag_id' => 1])
            ->create();
    }
}
