<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donations')->delete();
        $donations = array(
            array('id' => '1', 'user_id' => '1',    'anonymous' => '0',     'campaign_id' => '1',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2', 'user_id' => '1',    'anonymous' => '0',     'campaign_id' => '2',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3', 'user_id' => '1',    'anonymous' => '0',     'campaign_id' => '3',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4', 'user_id' => '1',    'anonymous' => '0',     'campaign_id' => '2',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5', 'user_id' => '1',    'anonymous' => '0',     'campaign_id' => '3',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6', 'user_id' => '1',    'anonymous' => '0',     'campaign_id' => '1',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7', 'user_id' => '1',    'anonymous' => '0',     'campaign_id' => '2',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8', 'user_id' => '2',    'anonymous' => '0',     'campaign_id' => '3',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9', 'user_id' => '2',    'anonymous' => '0',     'campaign_id' => '3',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10', 'user_id' => '2',   'anonymous' => '0',     'campaign_id' => '4',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11', 'user_id' => '2',    'anonymous' => '0',     'campaign_id' => '5',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12', 'user_id' => '2',    'anonymous' => '0',     'campaign_id' => '5',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('donations')->insert($donations);
    }
}