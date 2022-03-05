<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobileBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobile_banks')->delete();
        $mobileBanks = array(
            array('id' => '1',  'user_id' => '1',  'mobile_number' => '0987780870978',  'owner_name' => 'Saif Khan Faysal',       'bank_name' => 'Bank Asia',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'user_id' => '2',  'mobile_number' => '0987780870978',  'owner_name' => 'Mujahidul Islam Rony',   'bank_name' => 'Bank Asia',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'user_id' => '3',  'mobile_number' => '0987780870978',  'owner_name' => 'Sabbir Uddin Khan',      'bank_name' => 'DBBL',          'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'user_id' => '4',  'mobile_number' => '0987780870978',  'owner_name' => 'Arafat Irin Pinky',      'bank_name' => 'DBBL',          'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'user_id' => '5',  'mobile_number' => '0987780870978',  'owner_name' => 'Afroza Parvin Fancy',    'bank_name' => 'Grameen Bank',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('mobile_banks')->insert($mobileBanks);
    }
}
