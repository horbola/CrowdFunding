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
            array('id' => '1',  'user_id' => '1',  'careof' => 'father of Saif Khan Faysal',        'holding' => 'Khamar Bari', 'road' => 'Bahore', 'city' => 'Maijdee',   'subdivision' => 'Noakhali',    'division' => 'Comilla',   'country_id' => '18', 'phone' => '01873334000',  'email' => 'saifkhanfaysall@gmail.com',     'facebook' => '',   'twitter' => '',    'website' => 'www.snanoron.com',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'user_id' => '2',  'careof' => 'father of Mujahidul Islam Rony',    'holding' => 'Khamar Bari', 'road' => 'Bahore', 'city' => 'Maijdee',   'subdivision' => 'Noakhali',    'division' => 'Comilla',   'country_id' => '19', 'phone' => '01873334001',  'email' => 'rolena2z@gmail.com',            'facebook' => '',   'twitter' => '',    'website' => 'www.rolencloud.com',  'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'user_id' => '3',  'careof' => 'father of Sabbir Uddin Khan',       'holding' => 'Khamar Bari', 'road' => 'Bahore', 'city' => 'Maijdee',   'subdivision' => 'Noakhali',    'division' => 'Comilla',   'country_id' => '20', 'phone' => '01873334002',  'email' => 'sabbiruddinpavel@gmail.com',    'facebook' => '',   'twitter' => '',    'website' => 'www.snanoron2.com',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'user_id' => '4',  'careof' => 'father of Arafat Irin Pinky',       'holding' => 'Khamar Bari', 'road' => 'Bahore', 'city' => 'Maijdee',   'subdivision' => 'Noakhali',    'division' => 'Comilla',   'country_id' => '21', 'phone' => '01873334003',  'email' => 'pinky@gmail.com',               'facebook' => '',   'twitter' => '',    'website' => 'www.snanoron3.com',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'user_id' => '5',  'careof' => 'father of Afroza Parvin Fancy',     'holding' => 'Khamar Bari', 'road' => 'Bahore', 'city' => 'Maijdee',   'subdivision' => 'Noakhali',    'division' => 'Comilla',   'country_id' => '22', 'phone' => '01873334004',  'email' => 'fancy@gmail.com',               'facebook' => '',   'twitter' => '',    'website' => 'www.snanoron4.com',   'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        
        DB::table('addresses')->insert($addresses);
    }
}
