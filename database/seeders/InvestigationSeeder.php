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
            array('id' => '1',      'user_id' => '1',       'campaign_id' => '1',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'no',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',      'user_id' => '1',       'campaign_id' => '2',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',      'user_id' => '1',       'campaign_id' => '3',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',      'user_id' => '1',       'campaign_id' => '4',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',      'user_id' => '1',       'campaign_id' => '5',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',      'user_id' => '1',       'campaign_id' => '6',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'no',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',      'user_id' => '1',       'campaign_id' => '7',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',      'user_id' => '1',       'campaign_id' => '8',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'no',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9',      'user_id' => '1',       'campaign_id' => '9',        'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11',     'user_id' => '1',       'campaign_id' => '11',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '13',     'user_id' => '1',       'campaign_id' => '13',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '14',     'user_id' => '1',       'campaign_id' => '14',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'no',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '15',     'user_id' => '1',       'campaign_id' => '15',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '16',     'user_id' => '1',       'campaign_id' => '16',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'no',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '17',     'user_id' => '1',       'campaign_id' => '17',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '18',     'user_id' => '1',       'campaign_id' => '18',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'no',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '19',     'user_id' => '1',       'campaign_id' => '19',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '20',     'user_id' => '1',       'campaign_id' => '20',       'text_report' => 'this some investigation description for this campaign',       'image_report' => '',       'video_report' => '',      'is_verified' => 'yes',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('investigations')->insert($investigations);
    }
}
