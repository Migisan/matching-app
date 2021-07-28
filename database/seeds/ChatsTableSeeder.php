<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->delete();

        DB::table('chats')->insert(array(
            [
                'id' => 1,
                'from_user_id' => 1,
                'to_user_id' => 6,
                'message' => "はじめまして！",
            ],
            [
                'id' => 2,
                'from_user_id' => 6,
                'to_user_id' => 1,
                'message' => "こんにちは(^^)",
            ],
            [
                'id' => 3,
                'from_user_id' => 1,
                'to_user_id' => 7,
                'message' => "はじめまして！",
            ],
            [
                'id' => 4,
                'from_user_id' => 7,
                'to_user_id' => 1,
                'message' => "よろしく～",
            ],
        ));
    }
}
