<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->delete();
        $albums = array(
            array('id' => '1',       'campaign_id' => '1',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '2',       'campaign_id' => '1',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '3',       'campaign_id' => '1',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '4',       'campaign_id' => '1',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '5',       'campaign_id' => '2',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '6',       'campaign_id' => '2',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '7',       'campaign_id' => '2',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '8',       'campaign_id' => '2',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '9',       'campaign_id' => '3',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '10',      'campaign_id' => '3',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '11',      'campaign_id' => '3',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '12',      'campaign_id' => '3',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '13',      'campaign_id' => '4',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '14',      'campaign_id' => '4',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '15',      'campaign_id' => '4',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '16',      'campaign_id' => '4',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '17',      'campaign_id' => '5',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '18',      'campaign_id' => '5',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '19',      'campaign_id' => '5',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '20',      'campaign_id' => '5',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '22',      'campaign_id' => '6',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '23',      'campaign_id' => '6',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '24',      'campaign_id' => '6',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '25',      'campaign_id' => '6',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '26',      'campaign_id' => '7',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '27',      'campaign_id' => '7',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '28',      'campaign_id' => '7',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '29',      'campaign_id' => '7',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '30',      'campaign_id' => '8',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '31',      'campaign_id' => '8',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '32',      'campaign_id' => '8',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '33',      'campaign_id' => '8',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '34',      'campaign_id' => '9',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '35',      'campaign_id' => '9',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '36',      'campaign_id' => '9',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '37',      'campaign_id' => '9',    'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '38',      'campaign_id' => '10',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '39',      'campaign_id' => '10',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '40',      'campaign_id' => '10',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '41',      'campaign_id' => '10',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '42',      'campaign_id' => '11',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '43',      'campaign_id' => '11',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '44',      'campaign_id' => '11',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '45',      'campaign_id' => '11',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '46',      'campaign_id' => '12',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '47',      'campaign_id' => '12',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '48',      'campaign_id' => '12',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '49',      'campaign_id' => '12',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '50',      'campaign_id' => '13',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '51',      'campaign_id' => '13',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '52',      'campaign_id' => '13',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '53',      'campaign_id' => '13',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '54',      'campaign_id' => '14',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '55',      'campaign_id' => '14',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '56',      'campaign_id' => '14',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '57',      'campaign_id' => '14',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '58',      'campaign_id' => '15',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '59',      'campaign_id' => '15',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '60',      'campaign_id' => '15',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '61',      'campaign_id' => '15',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '62',      'campaign_id' => '16',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '63',      'campaign_id' => '16',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '64',      'campaign_id' => '16',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '65',      'campaign_id' => '16',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '66',      'campaign_id' => '17',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '67',      'campaign_id' => '17',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '68',      'campaign_id' => '17',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '69',      'campaign_id' => '17',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '70',      'campaign_id' => '18',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '71',      'campaign_id' => '18',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '72',      'campaign_id' => '18',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '73',      'campaign_id' => '18',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '74',      'campaign_id' => '19',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '75',      'campaign_id' => '19',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '76',      'campaign_id' => '19',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '77',      'campaign_id' => '19',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
            array('id' => '78',      'campaign_id' => '20',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_1.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '79',      'campaign_id' => '20',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_2.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '80',      'campaign_id' => '20',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_3.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            array('id' => '81',      'campaign_id' => '20',   'image_path' => '/uploads/campaign/full/16321297892m53y-bg1_4.jpg',     'video_path' => '',      'created_at' => '2021-08-05 04:17:09',     'updated_at' => '2021-08-05 04:17:09'),
            
        );
        
        DB::table('albums')->insert($albums);
    }
}
