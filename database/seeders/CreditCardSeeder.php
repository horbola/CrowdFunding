<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreditCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credit_cards')->delete();
        $creditCards = array(
            array('id' => '1',  'user_id' => '1',  'bank_name' => 'Bank Asia',     'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Saif Khan Faysal',       'card_number' => '0987780870978',   'card_issued' => '2021-08-05 04:17:09',  'card_expires' => '2021-08-15 04:17:09',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'user_id' => '2',  'bank_name' => 'Bank Asia',     'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Mujahidul Islam Rony',   'card_number' => '0987780870978',   'card_issued' => '2021-08-05 04:17:09',  'card_expires' => '2021-08-15 04:17:09',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'user_id' => '3',  'bank_name' => 'DBBL',          'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Sabbir Uddin Khan',      'card_number' => '0987780870978',   'card_issued' => '2021-08-05 04:17:09',  'card_expires' => '2021-08-15 04:17:09',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'user_id' => '4',  'bank_name' => 'DBBL',          'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Arafat Irin Pinky',      'card_number' => '0987780870978',   'card_issued' => '2021-08-05 04:17:09',  'card_expires' => '2021-08-15 04:17:09',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'user_id' => '5',  'bank_name' => 'Grameen Bank',  'bank_swift_code' => '0987780870978',  'branch_name' => 'Chatkhil',  'branch_swift_code' => '0987780870978',  'owner_name' => 'Afroza Parvin Fancy',    'card_number' => '0987780870978',   'card_issued' => '2021-08-05 04:17:09',  'card_expires' => '2021-08-15 04:17:09',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('credit_cards')->insert($creditCards);
    }
}
