<?php
    
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Lib\Helper;




class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'is_staff_picks',
        'title',
        'slug',
        'short_description',
        'description',
        'feature_image',
        'feature_video',
        'goal',
        'end_method',
        'start_date',
        'end_date',
        'min_amount',
        'max_amount',
        'recommended_amount',
        'amount_prefilled',
        'status',
        'is_funded',
    ];
    protected $guarded = [];
    
    public function campaigner() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function category() {
        // this method finds the category model in this way
        // $category = Category::find($this->category_id);
        return $this->belongsTo(Category::class);
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
    
    public function investigation() {
        // Investigation::find($this->campaign_id);
        return $this->hasOne(Investigation::class);
    }
    
    public function views() {
        return $this->hasMany(View::class);
    }
    
    public function likes() {
        return $this->hasMany(Like::class);
    }
    
    /*
     * gets only the main (parent) comments. replies are retrieved from comment model by 'replies' method.
     */
    public function comments() {
        // return $this->hasMany(Comment::class)->whereNull('parent_id')->orWhere('parent_id', 0)->orderBy('created_at', 'desc');
        return $this->hasMany(Comment::class, 'campaign_id')->whereNull('parent_id')->orWhere('parent_id', 0)->latest();
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
    
    /*
     * acmapaign may have many request item because many withdrew requests could be made
     * for a campaign as long as total raised money not withdrawn completely.
     */
    public function withdrawRequestItems() {
        return $this->hasMany(WithdrawRequestItem::class);
    }
    
    
    
    
    
    
    

    /*
     * produces related campaign on the basis of category
     */
    public function related() {
        $collection = Campaign::where('category_id', $this->category->id)->paginate(27)->collect();
        $filtered = $collection->reject(function ($value, $key) {
            return $value->id === $this->id;
        });
        return $filtered;
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
  
    public function thumbImagePath() {
        // replaces the word 'full' with 'thumb'
        $thumbImagePath = str_replace('full', 'thumb', $this->feature_image);
        return $thumbImagePath;
    }
    
    public function donorsCount() {
        $donations = Donation::where('campaign_id', $this->id)->get();
        $count = $donations->unique()->count();
        return $count;
    }
   
    /*
     * a campaigner may have created multiple campaigns. and
     * for a campaign there may have multiple donations. and
     * within a donation there may be multiple payments.
     * 
     * this method counts total succesful payment of all donations
     * for a campaign. that means total raised money for a campaign.
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
    
    
    /*
     * if full fund of any campaign is paid that that campaign is not fundable and
     * a campaign is funded fully if total paid amount of that campaign is less than
     * total Successful Donation..
     */
    public function isFundable() {
        return ($this->totalPaidFund() < $this->totalSuccessfulDonation()) && !($this->isBlocked()) && !$this->isPending();
    }
    
    public function isPending() {
        return $this->withdrawRequestItems()->get()->collect()->filter(function($aWRequestItem) {
            return $aWRequestItem->withdrawRequest->status === 1;
        })->count();
    }
    
    public function isCompletelyFunded() {
        return !($this->totalPaidFund() < $this->totalSuccessfulDonation()) && !$this->isPending();
    }
    
    public function isPartlyFunded() {
//        $partly = ($this->totalPaidFund() !== 0.00) && ($this->totalPaidFund() < $this->totalSuccessfulDonation());
        $partly = $this->totalPaidFund() && ($this->totalPaidFund() < $this->totalSuccessfulDonation()) && !$this->isPending();
        return $partly;
    }
    
    public function isNotFunded() {
//        return $this->totalPaidFund() === 0.00;
        return !$this->totalPaidFund() && !$this->isPending();
    }
    
    public function isBlocked() {
        $lastRecord = WithdrawRequestItem::where('campaign_id', $this->id)->latest()->first();
//        $lastRecord = WithdrawRequestItem::where('campaign_id', $this->id)->sortByDesc('created_at')->take(1)->toArray();;
//        $lastRecord = $this->wRequestItems()->latest()->first();
        return isset($lastRecord->status)? $lastRecord->status === 2 : false;
    }
    
    /*
     * calculates total funds requested by all campaigns of this campaigner
     */
    public function totalRequestedFund() {
//        return $this->wRequestItems()->sum('requested_amount');
        return $this->withdrawRequestItems()->get()->collect()->sum(function($aWRequestItem) {
//            if($aWRequestItem->withdrawRequest->user->id !== Auth::user()->id){
//                return 0;
//            }
            return $aWRequestItem->requested_amount;
        });
    }
    
    /*
     * calculates total funds paid by all campaigns of this campaigner
     */
    public function totalPaidFund() {
        return $this->withdrawRequestItems()->get()->collect()->sum(function($aWRequestItem) {
//            if($aWRequestItem->withdrawRequest->user->id !== Auth::user()->id){
//                return 0;
//            }
            return $aWRequestItem->paid_amount;
        });
    }
    
    /*
     * calculates total funds paid by all campaigns of this campaigner
     */
    public function totalResidualFund() {
        return $this->totalSuccessfulDonation() - $this->totalPaidFund();
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

