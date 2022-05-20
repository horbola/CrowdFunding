<?php
    
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Library\Helper;




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
    ];
    protected $guarded = [];
    
    
    // statuses -----------------------------------------------------
    public function isCampPreviewing() {
        return $this->status === -1;
    }
    
    public function isCampPending() {
        return $this->status === 0;
    }
    
    public function isCampApproved() {
        return $this->status === 1;
    }
    
    public function isCampCancelled() {
        return $this->status === 2;
    }
    
    public function isCampBlocked() {
        return $this->status === 3;
    }
    
    public function isCampDeclined() {
        return $this->status === 4;
    }
    
    // setters -------------------------------
    public function setsCampPreviewing() {
        $this->status = 4;
    }
    
    public function setCampPending() {
        $this->status = 4;
    }
    
    public function setCampApproved() {
        $this->status = 4;
    }
    
    public function setCampCancelled() {
        $this->status = 4;
    }
    
    public function setCampBlocked() {
        $this->status = 4;
    }
    
    public function setCampDeclined() {
        $this->status = 4;
    }
    // statuses -----------------------------------------------------
    
    
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
    
    public function isVerified() {
        // count() is used to detect whether any investigation is just posted or not.
        if( $this->investigation && $this->investigation->count() && $this->investigation->is_verified === 'yes' ){
            return true;
        }
        else return false;
    }
    
    // detects whether a any investigation report has been posted. if any investigation entry is present in investigation table but is_verified is no
    // then this means that some investigation report has been just posted but not verified yet.
    public function isPostedToVerify() {
        return $this->investigation;
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
        return $this->hasMany(Comment::class)
                ->where('parent_id', 0)
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take(5);
    }
    
    public function commentsTotal() {
        return $this->hasMany(Comment::class)->where('parent_id', 0)->get()->count();
    }
    
    /*
     * finds all the donations for this campaign
     */
    public function donations() {
        return $this->hasMany(Donation::class);
    }
    
    /*
     * finds all the donations for this campaign
     */
    public function donationsLimit() {
        return $this->donations()
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take(100);
    }
    
    /*
     * finds all the donations for this campaign which raised money isn't zero.
     */
    public function donationsLimitFilteredZero() {
        // iterates through all donations for this campaign.
        return $this->donationsLimit->reject(function($aDonation){
            return !$aDonation->totalPayableAmount();
        });
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
        $related = Campaign::where('category_id', $this->category->id)->paginate(27);
        $filtered = $related->getCollection()->reject(function ($value, $key) {
            return ($value->id === $this->id) || !$value->isActive();
        });
        $related->setCollection($filtered);
        return $related;
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
        return ($this->totalPaidFund() < $this->totalSuccessfulDonation()) && !$this->isPending() && !$this->isFundingBlocked();
    }
    
    public function isPending() {
        return $this->withdrawRequestItems->contains(function($aWRequestItem, $key) {
            return $aWRequestItem->isPending();
        });
    }
    
    public function isCompletelyFunded() {
        return !($this->totalPaidFund() < $this->totalSuccessfulDonation()) && !$this->isPending();
    }
    
    public function isPartlyFunded() {
//        $partly = ($this->totalPaidFund() !== 0.00) && ($this->totalPaidFund() < $this->totalSuccessfulDonation());
        $partly = $this->totalPaidFund() && ($this->totalPaidFund() < $this->totalSuccessfulDonation()) && !$this->isPending() && !$this->isFundingBlocked();
        return $partly;
    }
    
    /**
     * 
     * @return type Boolean
     * 
     * if totalPaidFund() is 0, then, it's not included.
     */
    public function isNotFunded() {
        return !$this->totalPaidFund() && !$this->isFundingBlocked() && !$this->isPending();
    }
    
    
    /**
     * 
     * @return type Boolean
     * 
     * determines if total raised money is zero or not.
     */
    public function hasNoMoneyRaised() {
        return !$this->totalSuccessfulDonation() || $this->totalSuccessfulDonation() === 0;
    }
    
    
    public function isFundingBlocked() {
        return $this->withdrawRequestItems->contains(function($wReqItem, $key){
            return $wReqItem->isCurrentlyBlocked();
        });
    }
    
    /* previous
    public function isBlocked() {
        $lastRecord = WithdrawRequestItem::where('campaign_id', $this->id)->latest()->first();
//        $lastRecord = WithdrawRequestItem::where('campaign_id', $this->id)->sortByDesc('created_at')->take(1)->toArray();;
//        $lastRecord = $this->wRequestItems()->latest()->first();
        return isset($lastRecord->status)? $lastRecord->status === 2 : false;
    }
    */
    
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
        
        if( (int)$this->status === 1 ){
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
    
    /*
     * if a campaign is active then the days number should be shown.
     * else if the campaign is not active but status is 1, that means
     * it's ended by goal achieved, then the status should be 'Completed'.
     * and in any other case campaign status would be as to the status code
     * in the database literally.
     */
    public function completionStatus(){
        if ($this->isActive()){
            return $this->daysLeft();
        }
        else if ( (int)$this->status === 1 ){
            return 'Completed';
        }
        else return Helper::decodeStatus($this->status);
    }
    
    public function isActive() {
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        if( (int)$this->status !== 1 ){
            return false;
        }
            
        // 0:ends-by-date, 1:ends-by-goal
        if ( (int)$this->end_method == 0 ){
            $raised = $this->totalSuccessfulDonation();
            if ($raised <= $this->goal){
                return true;
            }
        }elseif ( (int)$this->end_method == 1 ){
            if (Carbon::today()->toDateString() < $this->end_date){
                return true;
            }
        }

        return false;
    }
    
    public function isCompleted() {
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        if( (int)$this->status !== 1 ){
            return false;
        }
        
        // 0:ends-by-date, 1:ends-by-goal
        if ( (int)$this->end_method == 0 ){
            if (Carbon::today()->toDateString() > $this->end_date){
                return true;
            }
        }elseif ( (int)$this->end_method == 1 ){
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
    
    public function getCampHeadingDateFormat() {
        return Helper::formattedDate($this->created_at);
    }
}   

