<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->delete();
        $payments = array(
            array('id' => '1',     'donation_id' => '1',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '101',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',     'donation_id' => '2',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '102',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',     'donation_id' => '3',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '103',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',     'donation_id' => '4',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '104',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',     'donation_id' => '5',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '105',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',     'donation_id' => '6',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '106',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',     'donation_id' => '7',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '107',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',     'donation_id' => '8',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '108',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9',     'donation_id' => '9',       'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '109',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10',    'donation_id' => '10',      'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '110',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('payments')->insert($payments);
    }
}
