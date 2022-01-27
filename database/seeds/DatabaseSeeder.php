<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        \App\User::create([
//            'name' => 'admin',
//            'email' => 'admin@gmail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('asdffdsa'), // password
//            'remember_token' => Str::random(10),
//        ]);
//        $this->call(UserSeeder::class);
        $this->call(ArticleSeeder::class);



    }
}
