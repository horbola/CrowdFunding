<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shares')->delete();
        $shares = array(
            array('id' => '1',  'user_id' => '1',   'campaign_id' => '1',   'shared_link' => '',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'user_id' => '1',   'campaign_id' => '2',   'shared_link' => '',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'user_id' => '1',   'campaign_id' => '3',   'shared_link' => '',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'user_id' => '2',   'campaign_id' => '1',   'shared_link' => '',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'user_id' => '2',   'campaign_id' => '2',   'shared_link' => '',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('shares')->insert($shares);
    }
}
