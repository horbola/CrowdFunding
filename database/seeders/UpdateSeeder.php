<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('updates')->delete();
        $updates = array(
            array('id' => '1',       'campaign_id' => '1',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',       'campaign_id' => '2',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',       'campaign_id' => '3',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',       'campaign_id' => '4',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',       'campaign_id' => '5',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',       'campaign_id' => '6',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',       'campaign_id' => '7',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',       'campaign_id' => '8',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9',       'campaign_id' => '9',      'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10',      'campaign_id' => '10',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11',      'campaign_id' => '11',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12',      'campaign_id' => '12',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '13',      'campaign_id' => '13',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '14',      'campaign_id' => '14',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '15',      'campaign_id' => '15',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '16',      'campaign_id' => '16',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '17',      'campaign_id' => '17',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '18',      'campaign_id' => '18',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '19',      'campaign_id' => '19',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '20',      'campaign_id' => '20',     'descrip' => 'here will be put some description for this campaign',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        
        DB::table('updates')->insert($updates);
    }
}
