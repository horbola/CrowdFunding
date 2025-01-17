<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->delete();
        $banks = array(
            array('id' => '1',  'user_id' => '1',  'bank_name' => 'Bank Asia',     'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Saif Khan Faysal',       'owner_nid' => '1990751105700003',    'acc_number' => '0987780870978',      'status' => '1',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'user_id' => '2',  'bank_name' => 'Bank Asia',     'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Mujahidul Islam Rony',   'owner_nid' => '1990751105700003',    'acc_number' => '0987780870978',      'status' => '1',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'user_id' => '3',  'bank_name' => 'Bank Asia',     'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Sabbir Uddin Khan',      'owner_nid' => '1990751105700003',    'acc_number' => '0987780870978',      'status' => '1',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'user_id' => '4',  'bank_name' => 'Bank Asia',     'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Arafat Irin Pinky',      'owner_nid' => '1990751105700003',    'acc_number' => '0987780870978',      'status' => '1',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'user_id' => '5',  'bank_name' => 'Bank Asia',     'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Afroza Parvin Fancy',    'owner_nid' => '1990751105700003',    'acc_number' => '0987780870978',      'status' => '1',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('banks')->insert($banks);
    }
}
