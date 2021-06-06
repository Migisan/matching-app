<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SwipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('swipes')->delete();

        DB::table('swipes')->insert(array(
            [
                'id' => 1,
                'from_user_id' => 1,
                'to_user_id' => 6,
                'like' => 1,
            ],
            [
                'id' => 2,
                'from_user_id' => 6,
                'to_user_id' => 1,
                'like' => 1,
            ],
            [
                'id' => 3,
                'from_user_id' => 1,
                'to_user_id' => 7,
                'like' => 1,
            ],
            [
                'id' => 4,
                'from_user_id' => 7,
                'to_user_id' => 1,
                'like' => 1,
            ],
        ));
    }
}
