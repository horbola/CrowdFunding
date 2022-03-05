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

use App\Lib\Helper;




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
        // this method finds the category model in this way
        // $category = Category::find($this->category_id);
        return $this->belongsTo(Category::class);
    }
    
    public function related() {
        $collection = Campaign::where('category_id', $this->category->id)->paginate(27)->collect();
        $filtered = $collection->reject(function ($value, $key) {
            return $value->id === $this->id;
        });
        return $filtered;
    }
    
    /*
     * finds all the donations for this campaign
     */
    public function donations() {
        return $this->hasMany(Donation::class);
    }
    
    /*
     * finds all the donations of a single user for this campaign
     */
    public function donationsSingleUser($donorId) {
        return $this->hasMany(Donation::class)->where('user_id', $donorId);
    }
    
    public function views() {
        return $this->hasMany(View::class);
    }
    
    public function viewsCount() {
        $views = $this->views->count();
        if($views === 0 || $views === 1){
            $views = $views.' View';
        }
        else {
            $views = $views.' Views';
        }
        return $views;
    }
    
    public function likes() {
        return $this->hasMany(Like::class);
    }
    
    public function likesCount() {
        $likes = $this->likes->count();
        if($likes === 0 || $likes === 1){
            $likes = $likes.' Supports';
        }
        else {
            $likes = $likes.' Support';
        }
        return $likes;
    }
    
    public function hasLiked() {
        if(Auth::check()){
            return Like::whereUserId(Auth::user()->id)->whereCampaignId($this->id)->count();
        }
        else return 0;
        
    }
    
    /*
     * gets only the main (parent) comments. replies are retrieved from comment model by 'replies' method.
     */
    public function comments() {
        // return $this->hasMany(Comment::class)->whereNull('parent_id')->orWhere('parent_id', 0)->orderBy('created_at', 'desc');
        return $this->hasMany(Comment::class)->whereNull('parent_id')->orWhere('parent_id', 0)->latest();
    }
    
    public function album() {
        return $this->hasMany(Album::class);
    }
    
    public function documents() {
        return $this->hasMany(Document::class);
    }
    
    public function updates() {
        return $this->hasMany(Update::class);
    }
    
    public function thumbImagePath() {
        $thumbImagePath = str_replace('full', 'thumb', $this->feature_image);
        return $thumbImagePath;
    }
    
    public function donorsCount() {
        $donations = Donation::where('campaign_id', $this->id)->get();
        $count = $donations->unique()->count();
        return $count;
    }

    
    
    
    public function investigation() {
        // Investigation::find($this->campaign_id);
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
        return $this->donations->sum(function($aDonation){
            return $aDonation->totalPayableAmount();
        });
    }
    
    /*
     * this method counts total succesful payment of all donations
     * of a single user for a campaign.
     */
    public function totalSuccessfulDonationOfSingleUser($donorId) {
        return $this->donationsSingleUser($donorId)->sum(function($aDonation){
            return $aDonation->totalPayableAmount();
        });
    }
    
    public function daysLeft(){
        // time returns current time in seconds
        $diff = strtotime($this->end_date)-time();
        // seconds/minute*minutes/hour*hours/day)
        $days = floor($diff/(60*60*24));
        
        if($this->status === 1){
            if($days >= 0) {
                switch ($days) {
                    case 0:
                    case 1:
                        $days = $days.' day left';
                        break;
                    default:
                        $days = $days.' days left';
                }
            }
            else {
                $days = 'Completed';
            }
        }
        else {
            $days = Helper::decodeStatus($this->status);
        }
        
        return $days;
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
    
    public function parseAmountPrefilled() {
        $amounts = explode(',', $this->amount_prefilled);
        return $amounts;
    }
}   

