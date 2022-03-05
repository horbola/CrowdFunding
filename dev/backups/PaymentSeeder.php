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
            array('id' => '1',     'donation_id' => '1',        'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '101',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',     'donation_id' => '2',        'w_request_id' => '',        'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '102',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',     'donation_id' => '3',        'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '103',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',     'donation_id' => '4',        'w_request_id' => '',        'amount' => '1000',     'currency' => 'BDT',     'trans_id' => '104',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',     'donation_id' => '5',        'w_request_id' => '',        'amount' => '1000',     'currency' => 'BDT',     'trans_id' => '105',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',     'donation_id' => '6',        'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '106',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',     'donation_id' => '7',        'w_request_id' => '',        'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '107',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',     'donation_id' => '8',        'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '108',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9',     'donation_id' => '9',        'w_request_id' => '',        'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '109',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10',    'donation_id' => '10',       'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '110',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11',    'donation_id' => '11',       'w_request_id' => '',        'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '111',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12',    'donation_id' => '12',       'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '112',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '13',    'donation_id' => '13',       'w_request_id' => '',        'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '113',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '14',    'donation_id' => '14',       'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '114',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '15',    'donation_id' => '15',       'w_request_id' => '',        'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '115',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '16',    'donation_id' => '16',       'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '116',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '17',    'donation_id' => '17',       'w_request_id' => '',        'amount' => '50000',    'currency' => 'BDT',     'trans_id' => '117',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '18',    'donation_id' => '18',       'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '118',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '19',    'donation_id' => '19',       'w_request_id' => '',        'amount' => '1500',     'currency' => 'BDT',     'trans_id' => '119',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '20',    'donation_id' => '20',       'w_request_id' => '',        'amount' => '0',        'currency' => 'BDT',     'trans_id' => '120',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '21',    'donation_id' => '',         'w_request_id' => '1',       'amount' => '30000',    'currency' => 'BDT',     'trans_id' => '121',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '22',    'donation_id' => '',         'w_request_id' => '2',       'amount' => '30000',    'currency' => 'BDT',     'trans_id' => '122',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '23',    'donation_id' => '',         'w_request_id' => '3',       'amount' => '30000',    'currency' => 'BDT',     'trans_id' => '123',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '24',    'donation_id' => '',         'w_request_id' => '4',       'amount' => '30000',    'currency' => 'BDT',     'trans_id' => '124',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '25',    'donation_id' => '',         'w_request_id' => '5',       'amount' => '30000',    'currency' => 'BDT',     'trans_id' => '125',   'status' => 'Processing', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        DB::table('payments')->insert($payments);
    }
}
