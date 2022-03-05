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
            array('id' => '1',      'user_id' => '1',       'campaign_id' => '1',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',      'user_id' => '1',       'campaign_id' => '2',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',      'user_id' => '1',       'campaign_id' => '3',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',      'user_id' => '1',       'campaign_id' => '4',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',      'user_id' => '1',       'campaign_id' => '5',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',      'user_id' => '1',       'campaign_id' => '6',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',      'user_id' => '1',       'campaign_id' => '7',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',      'user_id' => '1',       'campaign_id' => '8',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9',      'user_id' => '1',       'campaign_id' => '9',        'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10',     'user_id' => '1',       'campaign_id' => '10',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11',     'user_id' => '1',       'campaign_id' => '11',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12',     'user_id' => '1',       'campaign_id' => '12',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '13',     'user_id' => '1',       'campaign_id' => '13',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '14',     'user_id' => '1',       'campaign_id' => '14',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '15',     'user_id' => '1',       'campaign_id' => '15',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '16',     'user_id' => '1',       'campaign_id' => '16',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '17',     'user_id' => '1',       'campaign_id' => '17',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '18',     'user_id' => '1',       'campaign_id' => '18',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '19',     'user_id' => '1',       'campaign_id' => '19',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '20',     'user_id' => '1',       'campaign_id' => '20',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('donations')->insert($donations);
    }
}
