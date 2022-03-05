<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $users = array(
            array('id' => '1', 'category_name' => 'Medical',            'category_slug' => 'medical',            'category_image' => '', 'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2', 'category_name' => 'Enterprenureship',   'category_slug' => 'enterprenureship',   'category_image' => '', 'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3', 'category_name' => 'Accident',           'category_slug' => 'accident',           'category_image' => '', 'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4', 'category_name' => 'Cancer',             'category_slug' => 'cancer',             'category_image' => '', 'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5', 'category_name' => 'Education',          'category_slug' => 'education',          'category_image' => '', 'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6', 'category_name' => 'Creative',           'category_slug' => 'creative',           'category_image' => '', 'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7', 'category_name' => 'NGO',                'category_slug' => 'ngo',                'category_image' => '', 'show_in_home' => '0', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8', 'category_name' => 'Charity',            'category_slug' => 'charity',            'category_image' => '', 'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        
        DB::table('categories')->insert($users);
    }
}
