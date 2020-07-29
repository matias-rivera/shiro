<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Forum;

class ForumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Forum::create(['name' => 'Laravel for coders',
        'description' => 'A little space for laravel coders to talk about the best PHP framework.',
        'url' => Str::lower(preg_replace('/\s+/', '', 'Laravel for coders'))]);

    }
}
