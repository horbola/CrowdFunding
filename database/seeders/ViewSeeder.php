<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('views')->delete();
        // first four campaign couldn't have views count by user 1. because campaign creator's views coudn't be recorded.
        $views = array(
            array('id' => '5',    'user_id' => '1',      'campaign_id' => '5',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '6',    'user_id' => '1',      'campaign_id' => '6',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '7',    'user_id' => '1',      'campaign_id' => '7',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '8',    'user_id' => '1',      'campaign_id' => '8',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '9',    'user_id' => '1',      'campaign_id' => '9',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '10',   'user_id' => '1',      'campaign_id' => '10',      'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            
            array('id' => '11',   'user_id' => '2',      'campaign_id' => '1',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12',   'user_id' => '2',      'campaign_id' => '2',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '13',   'user_id' => '2',      'campaign_id' => '3',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '14',   'user_id' => '2',      'campaign_id' => '4',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '15',   'user_id' => '2',      'campaign_id' => '5',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '16',   'user_id' => '2',      'campaign_id' => '6',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '17',   'user_id' => '2',      'campaign_id' => '7',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '18',   'user_id' => '2',      'campaign_id' => '8',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '19',   'user_id' => '2',      'campaign_id' => '9',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '20',   'user_id' => '2',      'campaign_id' => '10',      'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            
            array('id' => '21',   'user_id' => '3',      'campaign_id' => '1',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '22',   'user_id' => '3',      'campaign_id' => '2',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '23',   'user_id' => '3',      'campaign_id' => '3',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '24',   'user_id' => '3',      'campaign_id' => '4',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '25',   'user_id' => '3',      'campaign_id' => '5',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '26',   'user_id' => '3',      'campaign_id' => '6',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '27',   'user_id' => '3',      'campaign_id' => '7',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '28',   'user_id' => '3',      'campaign_id' => '8',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '29',   'user_id' => '3',      'campaign_id' => '9',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '30',   'user_id' => '3',      'campaign_id' => '10',      'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '31',   'user_id' => '4',      'campaign_id' => '1',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '32',   'user_id' => '4',      'campaign_id' => '2',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '33',   'user_id' => '4',      'campaign_id' => '3',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '34',   'user_id' => '4',      'campaign_id' => '4',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '35',   'user_id' => '4',      'campaign_id' => '5',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '36',   'user_id' => '4',      'campaign_id' => '6',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '37',   'user_id' => '4',      'campaign_id' => '7',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '38',   'user_id' => '4',      'campaign_id' => '8',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '39',   'user_id' => '4',      'campaign_id' => '9',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '40',   'user_id' => '4',      'campaign_id' => '10',      'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            
            array('id' => '41',   'user_id' => '5',      'campaign_id' => '1',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '42',   'user_id' => '5',      'campaign_id' => '2',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '43',   'user_id' => '5',      'campaign_id' => '3',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '44',   'user_id' => '5',      'campaign_id' => '4',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '45',   'user_id' => '5',      'campaign_id' => '5',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '46',   'user_id' => '5',      'campaign_id' => '6',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '47',   'user_id' => '5',      'campaign_id' => '7',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '48',   'user_id' => '5',      'campaign_id' => '8',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '49',   'user_id' => '5',      'campaign_id' => '9',       'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
            array('id' => '50',   'user_id' => '5',      'campaign_id' => '10',      'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),   
        );
        
        DB::table('views')->insert($views);
    }
}
