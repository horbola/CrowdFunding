<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            array('id' => '1', 'name' => 'Saif Khan Faysal',    'email' => 'saifkhanfaysall@gmail.com', 'password' => Hash::make('KnowThySelf1#'), 'active_status' => '1',    'is_volunteer' => '0',    'is_admin' => '1',   'is_super' => '1',   'photo' => '/uploads/avatar/16323014866lxdr-auroracoin_1.png', 'gender' => 'male',      'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2', 'name' => 'Mujahidul Islam Rony','email' => 'rolena2z@gmail.com',        'password' => Hash::make('KnowThySelf1#'), 'active_status' => '1',    'is_volunteer' => '0',    'is_admin' => '1',   'is_super' => '0',   'photo' => '/uploads/avatar/16323014866lxdr-auroracoin_2.png', 'gender' => 'male',      'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3', 'name' => 'Sabbir Uddin Khan',   'email' => 'sabbiruddinpavel@gmail.com','password' => Hash::make('KnowThySelf1#'), 'active_status' => '1',    'is_volunteer' => '0',    'is_admin' => '0',   'is_super' => '0',   'photo' => '/uploads/avatar/16323014866lxdr-auroracoin_3.png', 'gender' => 'male',      'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4', 'name' => 'Arafat Irin Pinky',   'email' => 'pinky@gmail.com',           'password' => Hash::make('KnowThySelf1#'), 'active_status' => '1',    'is_volunteer' => '0',    'is_admin' => '0',   'is_super' => '0',   'photo' => '/uploads/avatar/16323014866lxdr-auroracoin_4.png', 'gender' => 'female',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5', 'name' => 'Afroza Parvin Fancy', 'email' => 'fancy@gmail.com',           'password' => Hash::make('KnowThySelf1#'), 'active_status' => '1',    'is_volunteer' => '0',    'is_admin' => '0',   'is_super' => '0',   'photo' => '/uploads/avatar/16323014866lxdr-auroracoin_5.png', 'gender' => 'female',    'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        
        DB::table('users')->insert($users);
    }
}
