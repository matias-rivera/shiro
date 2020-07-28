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
        Forum::create(['name' => 'Laravel',
        'slug' => Str::slug('Laravel')]);

    }
}
