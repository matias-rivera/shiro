<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','root@admin.com')->first();
        $user2 = User::where('email','matias@user.com')->first();

        if(!$user){
            User::create([
                'role' => 'admin',
                'name' => 'ROOT',
                'username' => 'admin',
                'email' => 'root@admin.com',
                'password' => Hash::make('root'),

            ]);
        }

        if(!$user2){
            User::create([
                'role' => 'user',
                'name' => 'Matias',
                'username' => 'matias',
                'email' => 'matias@user.com',
                'password' => Hash::make('user'),

            ]);
        }
    }
}
