<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'campaign_id', 'text_report', 'image_report', 'video_report'];


    protected $gaurded = [];
    
    /*
     * returns the campaign model in which the invesgator makes the investigation
     */
    public function campaign() {
        // Campaign::where('campaing_id', $this->campaign_id);
        return $this->belongsTo(Campaign::class);
    }
    
    /*
     * returns the user model of investigator.
     * the 'key' by which the user model will be searched is specified
     * because the name (investigator) of this method is not same as to
     * the the key (user_id).
     */
    public function investigator() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
