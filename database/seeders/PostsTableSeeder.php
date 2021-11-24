<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
        Post::truncate();

        $tags = Tag::factory()->count(4)->create();


        Post::factory()
            ->count(10)
            ->hasAttached($tags)
            ->create();
    }
}
