<?php

namespace App\Library;


use DateTime;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Helper {
    /**
     * @param string $title
     * @param $model
     * @return string
     */
    static function unique_slug($title, $model = 'Campaign') {
        $slug = Str::slug($title);
        //get unique slug...
        $nSlug = $slug;
        $i = 0;

        $model = str_replace(' ', '', "\App\Models\ " . $model);
        while (($model::whereSlug($nSlug)->count()) > 0) {
            $i++;
            $nSlug = $slug . '-' . $i;
        }
        if ($i > 0) {
            $newSlug = substr($nSlug, 0, strlen($slug)) . '-' . $i;
        } else {
            $newSlug = $slug;
        }
        return $newSlug;
    }
    
    static function formattedTime($rawTime) {
        $date = date_parse($rawTime);
        $monthName = Helper::convertMonthNumToName($date['month']);
        return $dateString = $date['day'].' '.$monthName.', '.$date['year'].' at '.$date['hour'].':'.$date['minute'];
    }
    
    static function convertMonthNumToName($monthNum) {
        $dateObj = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F'); // March
        return $monthName;
    }
    
    static function decodeStatus($status) {
        switch ($status) {
            case 0: return 'Pending';   break;
            case 2: return 'Cancelled'; break;
            case 3: return 'Blocked';   break;
            case 4: return 'Declined';  break;
            default: return 'Can\'t define';
        }
    }
    
    /*
     * deletes an image and it's thumb image
     */
    static function deleteImage($image, $thumbImage='') {
        try {
            if (file_exists(public_path().$image)) {
                unlink(public_path().$image);
            }
            
            if (file_exists(public_path().$thumbImage)) {
                unlink(public_path().$thumbImage);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    

}

