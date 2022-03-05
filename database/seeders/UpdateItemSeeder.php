<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('update_items')->delete();
        $updateItems = array(
            array('id' => '1',       'update_id' => '1',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',       'update_id' => '1',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',       'update_id' => '1',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',       'update_id' => '1',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '5',       'update_id' => '2',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',       'update_id' => '2',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',       'update_id' => '2',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',       'update_id' => '2',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '9',       'update_id' => '3',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10',      'update_id' => '3',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11',      'update_id' => '3',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12',      'update_id' => '3',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '13',      'update_id' => '4',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '14',      'update_id' => '4',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '15',      'update_id' => '4',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '16',      'update_id' => '4',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '17',      'update_id' => '5',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '18',      'update_id' => '5',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '19',      'update_id' => '5',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '20',      'update_id' => '5',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '22',      'update_id' => '6',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '23',      'update_id' => '6',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '24',      'update_id' => '6',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '25',      'update_id' => '6',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '26',      'update_id' => '7',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '27',      'update_id' => '7',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '28',      'update_id' => '7',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '29',      'update_id' => '7',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '30',      'update_id' => '8',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '31',      'update_id' => '8',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '32',      'update_id' => '8',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '33',      'update_id' => '8',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '34',      'update_id' => '9',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '35',      'update_id' => '9',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '36',      'update_id' => '9',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '37',      'update_id' => '9',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '38',      'update_id' => '10',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '39',      'update_id' => '10',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '40',      'update_id' => '10',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '41',      'update_id' => '10',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '42',      'update_id' => '11',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '43',      'update_id' => '11',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '44',      'update_id' => '11',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '45',      'update_id' => '11',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '46',      'update_id' => '12',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '47',      'update_id' => '12',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '48',      'update_id' => '12',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '49',      'update_id' => '12',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '50',      'update_id' => '13',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '51',      'update_id' => '13',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '52',      'update_id' => '13',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '53',      'update_id' => '13',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '54',      'update_id' => '14',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '55',      'update_id' => '14',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '56',      'update_id' => '14',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '57',      'update_id' => '14',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '58',      'update_id' => '15',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '59',      'update_id' => '15',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '60',      'update_id' => '15',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '61',      'update_id' => '15',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '62',      'update_id' => '16',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '63',      'update_id' => '16',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '64',      'update_id' => '16',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '65',      'update_id' => '16',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '66',      'update_id' => '17',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '67',      'update_id' => '17',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '68',      'update_id' => '17',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '69',      'update_id' => '17',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '70',      'update_id' => '18',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '71',      'update_id' => '18',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '72',      'update_id' => '18',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '73',      'update_id' => '18',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '74',      'update_id' => '19',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '75',      'update_id' => '19',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '76',      'update_id' => '19',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '77',      'update_id' => '19',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '78',      'update_id' => '20',    'image_path' => '/uploads/updates/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '79',      'update_id' => '20',    'image_path' => '/uploads/updates/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '80',      'update_id' => '20',    'image_path' => '/uploads/updates/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '81',      'update_id' => '20',    'image_path' => '/uploads/updates/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
        );
        
        DB::table('update_items')->insert($updateItems);
    }
}
