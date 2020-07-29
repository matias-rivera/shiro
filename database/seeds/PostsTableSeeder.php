<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id' => 1,
            'title' => 'First post of laravel',
            'content' => 'dasdadasasasasasasasasasasasasasasasasasasasasasasasdasd23',
            'forum_id' => 1,
            'slug' => Str::slug('Laravel'),

        ]);
    }
}

