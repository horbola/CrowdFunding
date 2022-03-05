<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        $likes = array(
            array('id' => '1',  'user_id' => '1',   'campaign_id' => '1',   'parent_id' => '0',     'body' => 'this is a parent comment',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'user_id' => '1',   'campaign_id' => '1',   'parent_id' => '1',     'body' => 'this is a reply',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'user_id' => '1',   'campaign_id' => '1',   'parent_id' => '1',     'body' => 'this is a reply',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'user_id' => '1',   'campaign_id' => '1',   'parent_id' => '0',     'body' => 'this is a parent comment',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'user_id' => '1',   'campaign_id' => '1',   'parent_id' => '4',     'body' => 'this is a reply',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('comments')->insert($likes);
    }
}
