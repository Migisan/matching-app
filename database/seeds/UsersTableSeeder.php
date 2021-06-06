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
        DB::table('users')->delete();

        DB::table('users')->insert(array(
            [
                'id' => 1,
                'name' => 'テストユーザー',
                'email' => "test@example.com",
                'image' => "/storage/images/test.jpg",
                'password' => Hash::make('password123'),
                'sex' => "men",
                'introduction' => 'はじめまして！'
            ],
            [
                'id' => 2,
                'name' => '女性１',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women1.jpg",
                'password' => Hash::make('password123'),
                'sex' => "women",
                'introduction' => 'よろしくおねがいします。'
            ],
            [
                'id' => 3,
                'name' => '女性２',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women2.jpg",
                'password' => Hash::make('password123'),
                'sex' => "women",
                'introduction' => 'はじめまして！'
            ],
            [
                'id' => 4,
                'name' => '女性３',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women3.jpg",
                'password' => Hash::make('password123'),
                'sex' => "women",
                'introduction' => '仲良くしてください(^^)'
            ],
            [
                'id' => 5,
                'name' => '女性４',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women4.jpg",
                'password' => Hash::make('password123'),
                'sex' => "women",
                'introduction' => '話しましょ～'
            ],
            [
                'id' => 6,
                'name' => '女性５',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women5.jpg",
                'password' => Hash::make('password123'),
                'sex' => "women",
                'introduction' => '話しましょ～'
            ],
            [
                'id' => 7,
                'name' => '女性６',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/women6.jpg",
                'password' => Hash::make('password123'),
                'sex' => "women",
                'introduction' => '話しましょ～'
            ],
            [
                'id' => 8,
                'name' => '男性１',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/men1.jpg",
                'password' => Hash::make('password123'),
                'sex' => "men",
                'introduction' => '話しましょ～'
            ],
            [
                'id' => 9,
                'name' => '男性２',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/men2.jpg",
                'password' => Hash::make('password123'),
                'sex' => "men",
                'introduction' => '仲良くしてください(^^)'
            ],
            [
                'id' => 10,
                'name' => '男性３',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/men3.jpg",
                'password' => Hash::make('password123'),
                'sex' => "men",
                'introduction' => 'はじめまして！'
            ],
            [
                'id' => 11,
                'name' => '男性４',
                'email' => Str::random(10) . "@example.com",
                'image' => "/storage/images/men4.jpg",
                'password' => Hash::make('password123'),
                'sex' => "men",
                'introduction' => 'よろしくおねがいします。'
            ],
        ));
    }
}
