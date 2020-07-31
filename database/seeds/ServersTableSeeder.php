<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Server;

class ServersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Server::create(['name' => 'Laravel for everyone',
        'description' => 'A little space for laravel coders to talk about the best PHP framework.',
        'url' => Str::lower(preg_replace('/\s+/', '', 'Laravel for coders'))]);

        Server::create(['name' => 'The MERN Stack',
        'description' => 'MongoDB, ExpressJS, ReactJS and NodeJS. All in one place.',
        'url' => Str::lower(preg_replace('/\s+/', '', 'The MERN Stack'))]);

        Server::create(['name' => 'My Project',
        'description' => 'Share your projects and get feedback, all are welcome!',
        'url' => Str::lower(preg_replace('/\s+/', '', 'My Project'))]);

    }
}


