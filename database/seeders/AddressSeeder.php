<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->delete();
        $addresses = array(
            array('id' => '1',  'type' => 'permanent',  'user_id' => '1',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'type' => 'current',    'user_id' => '1',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'type' => 'permanent',  'user_id' => '2',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'type' => 'current',    'user_id' => '2',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'type' => 'permanent',  'user_id' => '3',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',  'type' => 'current',    'user_id' => '3',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',  'type' => 'permanent',  'user_id' => '4',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',  'type' => 'current',    'user_id' => '4',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9',  'type' => 'permanent',  'user_id' => '5',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10', 'type' => 'current',    'user_id' => '5',   'holding' => 'Khamar Bari',    'road' => 'Bahore',      'post_code' => '1229',     'upazilla' => 'Chatkhil',       'district' => 'Noakhali',       'country_id' => '18',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
        );
        
        DB::table('addresses')->insert($addresses);
    }
}
