<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WithdrawPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('withdraw_payments')->delete();
        $withdrawPayments = array(
            array('id' => '1',     'withdraw_request_id' => '1',       'payment_meth_type' => '1',     'payment_meth_id' => '1',     'amount' => '20000',    'currency' => 'BDT',     'trans_id' => '101',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',     'withdraw_request_id' => '2',       'payment_meth_type' => '1',     'payment_meth_id' => '2',     'amount' => '20000',    'currency' => 'BDT',     'trans_id' => '102',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',     'withdraw_request_id' => '3',       'payment_meth_type' => '1',     'payment_meth_id' => '3',     'amount' => '20000',    'currency' => 'BDT',     'trans_id' => '103',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',     'withdraw_request_id' => '4',       'payment_meth_type' => '1',     'payment_meth_id' => '4',     'amount' => '20000',    'currency' => 'BDT',     'trans_id' => '104',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',     'withdraw_request_id' => '5',       'payment_meth_type' => '1',     'payment_meth_id' => '5',     'amount' => '20000',    'currency' => 'BDT',     'trans_id' => '105',     'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('withdraw_payments')->insert($withdrawPayments);
    }
}
