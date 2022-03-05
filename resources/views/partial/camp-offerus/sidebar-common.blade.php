<div class="section-444 d-flex justify-content-between">
    @php
        use App\Library\Helper;
    @endphp
    @if( $campaign->investigation && $campaign->investigation->is_verified === 'yes' )
    <p>
        <img class="img-fluid verimg" src="/images/verify.png" alt=""> Verified Campaign
    </p>
    @else
    <p>
        <img class="img-fluid verimg" src="/images/verify.png" alt=""> Not Verified
    </p>
    @endif
    <p>
        <img class="img-fluid verimg" src="/images/icons/share.png" alt=""> Share
    </p>
</div>
<div class="section-445 d-flex justify-content-between">
    <p>
        <i class="fas fa-clock" aria-hidden="true"></i> {{$campaign->daysLeft()}}
    </p>
    <p>
        <i class="fas fa-user" aria-hidden="true"></i> {{$campaign->donorsCount()}} donors
    </p>
</div>

<div class="section-446 d-flex justify-content-between">
    @php
        $totalDonation = $campaign->totalSuccessfulDonation(true);
        $goal = $campaign->goal;
        $parcent = ((100/$goal) * $totalDonation);
    @endphp
    <div class="d-flex align-items-center">
        <div>
            <p style="color:#42CCAE;"><i class="fas fa-dollar-sign" aria-hidden="true"></i> Raised: {{ Helper::formatMoneyFigure($totalDonation) }}</p>
            <p><i class="fas fa-flag" aria-hidden="true"></i> Goal: {{ Helper::formatMoneyFigure($goal) }}</p>
        </div>
    </div>
    <div>
        <div class="progressbar">
            <svg class="radial-progress" data-percentage="{{ $parcent }}" viewBox="0 0 80 80">
                <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 29.9646px;"></circle>
                <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">{{ round($parcent) }}%</text>
            </svg>
        </div>
    </div>
</div>

<div class="section-447">
    <form action="{{route('donation.createDialogues')}}" method="get">
        @csrf
        <input class="donation-amount" type="number" name="amount" placeholder="2000.00 tk" required>
        <div class="btns-holder">
            <div class="d-flex justify-content-between">
                @foreach($campaign->parseAmountPrefilled() as $amount)
                <button type="button" onclick="enterAmount(this)">{{$amount}}</button>
                @endforeach
                <script>
                    function enterAmount(thiss){
                        $(thiss).siblings().css('box-shadow', 'none');
                        $(thiss).css('box-shadow', '1px 1px 2px 2px rgba(0, 0, 0, 0.15)');
                        $(thiss).closest('form').find('input[name=amount]').val($(thiss).text()).focus();
                    }
                </script>
            </div>
        </div>
        @if(Auth::check())
        <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
        @endif
        <input name="campaign_id" type="hidden" value="{{$campaign->id}}">
        <input name="anonymous" type="hidden" value="Open">
        
        <!--
        <button type="submit"  class="donation-model-btn" value="">
            <span>Donate Now</span>
            <span class="anon" onclick="anon(this);" data-bs-toggle="tooltip" data-bs-placement="top" title="Donate As Anonymous"><i class="fas fa-eye-slash" aria-hidden="true"></i></span>
            <script> function anon(thiss){ $(thiss).closest('form').find('input[name=anonymous]').val('Yes'); }</script>
        </button>
        -->
        
        <button type="submit"  class="donation-model-btn" onclick="anon(this, 'Open');" {{ !$campaign->isActive()? 'disabled' : '' }}><span>Donate Now</span></button>
        <button type="submit"  class="donation-model-btn" onclick="anon(this, 'Yes');" {{ !$campaign->isActive()? 'disabled' : '' }}><span>Donate Now As Anonymous</span></button>
        <script> function anon(thiss, isAnon){ $(thiss).closest('form').find('input[name=anonymous]').val(isAnon); }</script>
        <style>
            .section-447 .donation-model-btn {
                border: 0;
                background-color: #ffffff;
                color: #383C59;
                width: 100%;
                border-radius: 50px;
                text-align: center;
                padding: 10px;
                margin-top: 40px;
            }
            
            .section-447 .anon {
                padding-left: 5px;
            }
            
            .section-447 .donation-amount {
                border: 0;
                background-color: #7fdcc8;
                font-size: 20px;
                color: #fff;
                width: 100%;
                border-radius: 50px;
                text-align: center;
                padding: 10px;
            }

            .section-447 .donation-amount::placeholder {
                color: #fff;
                opacity: 1;
            }
        </style>
    </form>
</div>
<div class="section-448">
    <div class="d-flex justify-content-around">
        <div class="text-center">
            <i class="fas fa-heart" aria-hidden="true"></i>
            <p>{{$campaign->likesCount()}}</p>
        </div>
        <div class="text-center">
            <i class="fas fa-eye" aria-hidden="true"></i>
            <p>{{$campaign->viewsCount()}}</p>
        </div>
        <div class="text-center">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
            <p>{{$campaign->campaigner->location()}}</p>
        </div>
    </div>
</div>

