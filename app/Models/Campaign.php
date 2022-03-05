<?php
    
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Country;
use App\Models\View;
use App\Models\Category;
use App\Models\Comment;




class Campaign extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function campaigner() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function country() {
        return $this->belongsTo(Country::class);
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function donations() {
        return $this->hasMany(Donation::class);
    }
    
    public function views() {
        return $this->hasMany(View::class);
    }
    
    public function hasLiked() {
        return Like::whereUserId(Auth::user()->id)->whereCampaignId($this->id)->count();
    }
    
    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->orWhere('parent_id', 0);
    }
    
    public function investigation() {
        return $this->hasOne(Investigation::class);
    }
    
    /*
     * a campaigner may have created multiple campaigns. and
     * for a campaign there may have multiple donations. and
     * within a donation there may be multiple payments.
     * 
     * this method counts total succesful payment of all donations
     * for a campaign.
     */
    public function totalSuccessfulDonation() {
        return $this->donation->sum(function($aDonation){
            return $aDonation->totalPayableAmount();
        });
    }
    
    public function daysLeft(){
        // time returns current time in seconds
        $diff = strtotime($this->end_date)-time();
        // seconds/minute*minutes/hour*hours/day)
        return floor($diff/(60*60*24));
    }
    
    public function isActive() {
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        if($this->status !== 1){
            return false;
        }
            
        // 0:ends-by-date, 1:ends-by-goal
        if ($this->end_method == 0){
            if (Carbon::today()->toDateString() < $this->end_date){
                return true;
            }
        }elseif ($this->end_method == 1){
            $raised = $this->totalSuccessfulDonation();
            if ($raised <= $this->goal){
                return true;
            }
        }

        return false;
    }
    
    public function isCompleted() {
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        if($this->status !== 1){
            return false;
        }
        
        // 0:ends-by-date, 1:ends-by-goal
        if ($this->end_method == 0){
            if (Carbon::today()->toDateString() > $this->end_date){
                return true;
            }
        }elseif ($this->end_method == 1){
            $raised = $this->totalSuccessfulDonation();
            if ($raised > $this->goal){
                return true;
            }
        }

        return false;
    }
}   

