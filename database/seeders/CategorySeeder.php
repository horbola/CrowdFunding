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
            array('id' => '1', 'category_name' => 'Medical',                'category_slug' => 'medical',                  'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-hospital-symbol',     'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2', 'category_name' => 'Education',              'category_slug' => 'education',                'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-book',                'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3', 'category_name' => 'Animals',                'category_slug' => 'animals',                  'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-github-alt',          'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4', 'category_name' => 'Creative',               'category_slug' => 'creative',                 'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-lightbulb-alt',       'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '5', 'category_name' => 'Food & Hunger',          'category_slug' => 'food&hunger',              'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-gift',                'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6', 'category_name' => 'Environment',            'category_slug' => 'environment',              'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-cloud-moon-rain',     'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7', 'category_name' => 'Woman & Children',       'category_slug' => 'woman&children',           'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-house-user',          'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8', 'category_name' => 'Memorial',               'category_slug' => 'memorial',                 'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-envelope-heart',      'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '9', 'category_name' => 'Volunteer',              'category_slug' => 'volunteer',                'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-book-reader',         'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10', 'category_name' => 'Nonprofit',             'category_slug' => 'nonprofit',                'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-0-plus',              'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11', 'category_name' => 'Comunity Development',  'category_slug' => 'comunity-development',     'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-caret-right',         'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12', 'category_name' => 'Others',                'category_slug' => 'others',                   'category_image' => '/uploads/category/1633427296yxfzh-bg01_8.jpg',    'category_icon' => 'uil-list-ul',             'show_in_home' => '1', 'created_at' => '2021-08-05 04:17:09', 'updated_at' => '2021-08-05 04:17:09'),
        );
        
        DB::table('categories')->insert($users);
    }
}
