<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WithdrawRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('withdraw_requests')->delete();
        $wRequests = array(
            array('id' => '1',      'user_id' => '1',   'status' => '1',    'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',      'user_id' => '1',   'status' => '1',    'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',      'user_id' => '2',   'status' => '1',    'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',      'user_id' => '3',   'status' => '1',    'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',      'user_id' => '4',   'status' => '1',    'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',      'user_id' => '5',   'status' => '1',    'created_at' => '2021-08-05 04:17:09',      'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('withdraw_requests')->insert($wRequests);
    }
}
