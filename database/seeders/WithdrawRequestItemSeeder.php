<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WithdrawRequestItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('withdraw_request_items')->delete();
        $wRequestsItem = array(
            array('id' => '1',      'withdraw_request_id' => '1',   'campaign_id' => '2',    'requested_amount' => '30000',     'paid_amount' => '30000',   'status' => 2,     'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',      'withdraw_request_id' => '1',   'campaign_id' => '4',    'requested_amount' => '30000',     'paid_amount' => '30000',   'status' => 2,     'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',      'withdraw_request_id' => '2',   'campaign_id' => '2',    'requested_amount' => '10000',     'paid_amount' => '0',       'status' => 1,     'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',      'withdraw_request_id' => '2',   'campaign_id' => '4',    'requested_amount' => '10000',     'paid_amount' => '0',       'status' => 1,     'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',      'withdraw_request_id' => '3',   'campaign_id' => '7',    'requested_amount' => '30000',     'paid_amount' => '0',       'status' => 1,     'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',      'withdraw_request_id' => '4',   'campaign_id' => '9',    'requested_amount' => '30000',     'paid_amount' => '0',       'status' => 1,     'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',      'withdraw_request_id' => '5',   'campaign_id' => '13',   'requested_amount' => '30000',     'paid_amount' => '0',       'status' => 1,     'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',      'withdraw_request_id' => '6',   'campaign_id' => '17',   'requested_amount' => '30000',     'paid_amount' => '0',       'status' => 1,     'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('withdraw_request_items')->insert($wRequestsItem);
    }
}
