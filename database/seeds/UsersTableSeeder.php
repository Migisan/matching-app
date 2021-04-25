<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women1.jpg",
                'password' => Hash::make('password'),
                'sex' => "women"
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women2.jpg",
                'password' => Hash::make('password'),
                'sex' => "women"
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women3.jpg",
                'password' => Hash::make('password'),
                'sex' => "women"
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women4.jpg",
                'password' => Hash::make('password'),
                'sex' => "women"
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/men1.jpg",
                'password' => Hash::make('password'),
                'sex' => "men"
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/men2.jpg",
                'password' => Hash::make('password'),
                'sex' => "men"
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/men3.jpg",
                'password' => Hash::make('password'),
                'sex' => "men"
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/men4.jpg",
                'password' => Hash::make('password'),
                'sex' => "men"
            ],
        ]);
    }
}
