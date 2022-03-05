<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Investigation extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'campaign_id', 'text_report', 'image_report', 'video_report', 'is_verified'];


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
    
    public function postedInvReport() {
        return $this->campaign_id;
    }
    
    public function isInvestigated() {
        return $this->postedInvReport() && $this->is_verified === 'yes';
    }
    
    /* not used */
    public function investigatedByMe() {
        return $this->user_id === Auth::user()->id;
    }
    
}
