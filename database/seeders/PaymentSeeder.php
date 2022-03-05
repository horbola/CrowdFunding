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
            array('id' => '1',     'donation_id' => '1',     'payment_meth_type' => '1', 'payment_meth_id' => '1', 'amount' => '500',  'trans_id' => '101', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',     'donation_id' => '1',     'payment_meth_type' => '1', 'payment_meth_id' => '1', 'amount' => '500',  'trans_id' => '102', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',     'donation_id' => '2',     'payment_meth_type' => '1', 'payment_meth_id' => '1', 'amount' => '500',  'trans_id' => '102', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',     'donation_id' => '3',     'payment_meth_type' => '1', 'payment_meth_id' => '1', 'amount' => '1000', 'trans_id' => '103', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',     'donation_id' => '4',     'payment_meth_type' => '1', 'payment_meth_id' => '2', 'amount' => '1000', 'trans_id' => '104', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',     'donation_id' => '5',     'payment_meth_type' => '2', 'payment_meth_id' => '2', 'amount' => '500',  'trans_id' => '105', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',     'donation_id' => '6',     'payment_meth_type' => '2', 'payment_meth_id' => '3', 'amount' => '2000', 'trans_id' => '106', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',     'donation_id' => '7',     'payment_meth_type' => '2', 'payment_meth_id' => '3', 'amount' => '2000', 'trans_id' => '107', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9',     'donation_id' => '8',     'payment_meth_type' => '2', 'payment_meth_id' => '3', 'amount' => '2000', 'trans_id' => '108', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10',     'donation_id' => '9',     'payment_meth_type' => '3', 'payment_meth_id' => '3', 'amount' => '2000', 'trans_id' => '109', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11',    'donation_id' => '10',    'payment_meth_type' => '3', 'payment_meth_id' => '3', 'amount' => '2000', 'trans_id' => '110', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12',    'donation_id' => '11',    'payment_meth_type' => '1',  'payment_meth_id' => '1',  'amount' => '1500', 'trans_id' => '111', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '13',    'donation_id' => '12',    'payment_meth_type' => '1',  'payment_meth_id' => '1',  'amount' => '1500', 'trans_id' => '112', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('payments')->insert($payments);
    }
}
