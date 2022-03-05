<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_extras')->delete();
        $userExtras = array(
            array('id' => '1',  'user_id' => '1',   'birth_date' => '1990-05-30',   'phone' => '01873334000',   'nid' => '19907511057000003',    'careof' => 'father of Saif Khan Faysal',           'careof_phone' => '01873334000',     'facebook' => 'http://www.facebook.com/saif.khan.faysall',       'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',  'user_id' => '2',   'birth_date' => '1990-05-30',   'phone' => '01873334000',   'nid' => '19907511057000003',    'careof' => 'father of Mujahidul Islam Rony',       'careof_phone' => '01873334000',     'facebook' => 'http://www.facebook.com/saif.khan.faysall',       'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',  'user_id' => '3',   'birth_date' => '1990-05-30',   'phone' => '01873334000',   'nid' => '19907511057000003',    'careof' => 'father of Sabbir Uddin Khan',          'careof_phone' => '01873334000',     'facebook' => 'http://www.facebook.com/saif.khan.faysall',       'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',  'user_id' => '4',   'birth_date' => '1990-05-30',   'phone' => '01873334000',   'nid' => '19907511057000003',    'careof' => 'father of Arafat Irin Pinky',          'careof_phone' => '01873334000',     'facebook' => 'http://www.facebook.com/saif.khan.faysall',       'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5',  'user_id' => '5',   'birth_date' => '1990-05-30',   'phone' => '01873334000',   'nid' => '19907511057000003',    'careof' => 'father of Afroza Parvin Fancy',        'careof_phone' => '01873334000',     'facebook' => 'http://www.facebook.com/saif.khan.faysall',       'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
        );
        
        DB::table('user_extras')->insert($userExtras);
    }
}
