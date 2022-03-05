<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investigations')->delete();
        $investigations = array(
            array('id' => '1',  'user_id' => '1',   'campaign_id' => '1',   'text_report' => 'this some investigation description for this campaign',   'image_report' => '',   'video_report' => '',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'user_id' => '1',   'campaign_id' => '2',   'text_report' => 'this some investigation description for this campaign',   'image_report' => '',   'video_report' => '',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'user_id' => '1',   'campaign_id' => '3',   'text_report' => 'this some investigation description for this campaign',   'image_report' => '',   'video_report' => '',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'user_id' => '2',   'campaign_id' => '1',   'text_report' => 'this some investigation description for this campaign',   'image_report' => '',   'video_report' => '',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'user_id' => '2',   'campaign_id' => '2',   'text_report' => 'this some investigation description for this campaign',   'image_report' => '',   'video_report' => '',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('investigations')->insert($investigations);
    }
}
