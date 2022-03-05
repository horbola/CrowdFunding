<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Category;
use App\Country;
use App\Payment;
use App\Reward;
use Carbon\Carbon;
use Validator;
use App\Comment;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('app.start_a_campaign');
        $categories = Category::all();
        $countries = Country::all();

        return view('admin.start_campaign', compact('title', 'categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'category'      => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'goal'          => 'required',
            'end_method'    => 'required',
            'country_id'    => 'required',
        ];

        $this->validate($request, $rules);

        $user_id = Auth::user()->id;

        $slug = unique_slug($request->title);
        
        //feature image has been moved to update
        $data = [
            'user_id'           => $user_id,
            'category_id'       => $request->category,
            'title'             => $request->title,
            'slug'              => $slug,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'campaign_owner_commission'              => get_option('campaign_owner_commission'),
            'goal'              => $request->goal,
            'min_amount'        => $request->min_amount,
            'max_amount'        => $request->max_amount,
            'recommended_amount' => $request->recommended_amount,
            'amount_prefilled'  => $request->amount_prefilled,
            'end_method'        => $request->end_method,
            'video'             => $request->video,
            'feature_image'     => '',
            'status'            => 0,
            'country_id'        => $request->country_id,
            'address'           => $request->address,
            'is_funded'         => 0,
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
        ];

        $create = Campaign::create($data);

        if ($create){
            return redirect(route('edit_campaign', $create->id))->with('success', trans('app.campaign_created'));
        }
        return back()->with('error', trans('app.something_went_wrong'))->withInput($request->input());
    }


    public function myCampaigns(){
        $title = trans('app.my_campaigns');
        $user = request()->user();
        //$my_campaigns = $user->my_campaigns;
        $my_campaigns = Campaign::whereUserId($user->id)->orderBy('id', 'desc')->get();

        return view('admin.my_campaigns', compact('title', 'my_campaigns'));
    }

    public function myPendingCampaigns(){
        $title = trans('app.pending_campaigns');
        $user = request()->user();
        $my_campaigns = Campaign::pending()->whereUserId($user->id)->orderBy('id', 'desc')->get();

        return view('admin.my_campaigns', compact('title', 'my_campaigns'));
    }


    
    public function allCampaigns(){
        $title = trans('app.all_campaigns');
        $campaigns = Campaign::active()->orderBy('id', 'desc')->paginate(20);
        return view('admin.all_campaigns', compact('title', 'campaigns'));
    }

    public function staffPicksCampaigns(){
        $title = trans('app.staff_picks');
        $campaigns = Campaign::staff_picks()->orderBy('id', 'desc')->paginate(20);
        return view('admin.all_campaigns', compact('title', 'campaigns'));
    }
    public function fundedCampaigns(){
        $title = trans('app.funded');
        $campaigns = Campaign::funded()->orderBy('id', 'desc')->paginate(20);
        return view('admin.all_campaigns', compact('title', 'campaigns'));
    }


    public function blockedCampaigns(){
        $title = trans('app.blocked_campaigns');
        $campaigns = Campaign::blocked()->orderBy('id', 'desc')->paginate(20);
        return view('admin.all_campaigns', compact('title', 'campaigns'));
    }
    public function pendingCampaigns(){
        $title = trans('app.pending_campaigns');
        $campaigns = Campaign::pending()->orderBy('id', 'desc')->paginate(20);
        return view('admin.all_campaigns', compact('title', 'campaigns'));
    }

    public function expiredCampaigns(){
        $title = trans('app.expired_campaigns');
        $campaigns = Campaign::active()->expired()->orderBy('id', 'desc')->paginate(20);
        return view('admin.all_campaigns', compact('title', 'campaigns'));
    }


    public function searchAdminCampaigns(Request $request){
        $title = trans('app.campaigns_search_results');
        $campaigns = Campaign::where('title', 'like', "%{$request->q}%")->orderBy('id', 'desc')->paginate(20);
        return view('admin.all_campaigns', compact('title', 'campaigns'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug = null)
    {
        $campaign = Campaign::find($id);
        $title = $campaign->title;

        $enable_discuss = get_option('enable_disqus_comment_in_blog');
        return view('campaign_single', compact('campaign', 'title', 'enable_discuss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_type = request()->user()->user_type;
        $user_id   = request()->user()->id;
        $campaign  = Campaign::find($id);
        //todo: checked if admin then he can access...
        if($user_type != 'admin'){
            if ($campaign->user_id != $user_id){
                exit('Unauthorized access');
            }
        }

        $title = trans('app.edit_campaign');
        $categories = Category::all();
        $countries = Country::all();

        return view('admin.edit_campaign', compact('title', 'categories', 'countries', 'campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $rules = [
            'category'      => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'goal'          => 'required',
            'country_id'    => 'required',
            'feature_image' => 'max:500',
        ];

        $this->validate($request, $rules);

        $campaign = Campaign::find($id);

        $image_name = $campaign->feature_image;
        if ($request->hasFile('feature_image')){
            $upload_dir = public_path('uploads/images/');
            if ( ! file_exists($upload_dir)){
                mkdir($upload_dir, 0777, true);
            }
            $thumb_dir = public_path('uploads/images/thumb/');
            if ( ! file_exists($thumb_dir)){
                mkdir($thumb_dir, 0777, true);
            }

            //Delete old image
            if ($image_name){
                if (file_exists($upload_dir.$image_name)){
                    unlink($upload_dir.$image_name);
                }
                if (file_exists($thumb_dir.$image_name)){
                    unlink($thumb_dir.$image_name);
                }
            }

            $image = $request->file('feature_image');
            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
            $full_image = Image::make($image)->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $resized = Image::make($image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_name = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            $thumbFileName = $thumb_dir.$image_name;
            $imageFileName = $upload_dir.$image_name;

            try{
                //Uploading original image
                $full_image->save($imageFileName);
                //Uploading thumb
                $resized->save($thumbFileName);
            } catch (\Exception $e){
                return $e->getMessage();
            }
        }
        $data = [
            'category_id'       => $request->category,
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'goal'              => $request->goal,
            'min_amount'        => $request->min_amount,
            'max_amount'        => $request->max_amount,
            'recommended_amount' => $request->recommended_amount,
            'amount_prefilled'  => $request->amount_prefilled,
            'end_method'        => $request->end_method,
            'video'             => $request->video,
            'feature_image'     => $image_name,
            'country_id'        => $request->country_id,
            'address'           => $request->address,
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
        ];

        $update = Campaign::whereId($id)->update($data);

        if ($update){
            return redirect(route('edit_campaign', $id))->with('success', trans('app.campaign_created'));
        }
        return back()->with('error', trans('app.something_went_wrong'))->withInput($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showBackers($id){
        $campaign = Campaign::find($id);
        $title = trans('app.backers').' | '.$campaign->title;
        return view('campaign_backers', compact('campaign', 'title'));

    }

    public function showUpdates($id){
        $campaign = Campaign::find($id);
        $title = $campaign->title;
        return view('campaign_update', compact('campaign', 'title'));
    }

    public function showFaqs($id){
        $campaign = Campaign::find($id);
        $title = $campaign->title;
        return view('campaign_faqs', compact('campaign', 'title'));
    }

    /**
     * @param $id
     * @return mixed
     * 
     * todo: need to be moved it to reward controller
     */
    public function rewardsInCampaignEdit($id){
        $title = trans('app.campaign_rewards');
        $campaign = Campaign::find($id);
        $rewards = Reward::whereCampaignId($campaign->id)->get();
        return view('admin.campaign_rewards', compact('title', 'campaign', 'rewards'));
    }

    /**
     * @param Request $request
     * @param int $reward_id
     * @return mixed
     */
    public function addToCart(Request $request, $reward_id = 0){
        if ($reward_id){
            //If checkout request come from reward
            session( ['cart' =>  ['cart_type' => 'reward', 'reward_id' => $reward_id] ] );

            $reward = Reward::find($reward_id);
            if($reward->campaign->is_ended()){
                $request->session()->forget('cart');
                return redirect()->back()->with('error', trans('app.invalid_request'));
            }
        }else{
            //Or if comes from donate button
            session( ['cart' =>  ['cart_type' => 'donation', 'campaign_id' => $request->campaign_id, 'amount' => $request->amount ] ] );
        }


        return redirect(route('checkout'));
    }

    public function statusChange($id, $status = null){

        $campaign = Campaign::find($id);
        if ($campaign && $status){

            if ($status == 'approve'){
                $campaign->status = 1;
                $campaign->save();

            }elseif($status == 'block'){
                $campaign->status = 2;
                $campaign->save();
            }elseif($status == 'funded'){
                $campaign->is_funded = 1;
                $campaign->save();
            }elseif ($status == 'add_staff_picks'){
                $campaign->is_staff_picks = 1;
                $campaign->save();

            }elseif($status == 'remove_staff_picks'){
                $campaign->is_staff_picks = 0;
                $campaign->save();
            }

        }
        return back()->with('success', trans('app.status_updated'));
    }

    /**
     * @return mixed
     *
     * Checkout page
     */
    public function checkout(){
        $title = trans('app.checkout');
        if ( ! session('cart')){
            return view('checkout_empty', compact('title'));
        }

        $reward = null;
        if(session('cart.cart_type') == 'reward'){
            $reward = Reward::find(session('cart.reward_id'));
            $campaign = Campaign::find($reward->campaign_id);
        }elseif (session('cart.cart_type') == 'donation'){
            $campaign = Campaign::find(session('cart.campaign_id'));
        }
        if (session('cart')){
            return view('checkout', compact('title', 'campaign', 'reward'));
        }
        return view('checkout_empty', compact('title'));
    }

    public function checkoutPost(Request $request){
        $title = trans('app.checkout');

        if ( ! session('cart')){
            return view('checkout_empty', compact('title'));
        }

        $cart = session('cart');
        $input = array_except($request->input(), '_token');
        session(['cart' => array_merge($cart, $input)]);

        if(session('cart.cart_type') == 'reward'){
            $reward = Reward::find(session('cart.reward_id'));
            $campaign = Campaign::find($reward->campaign_id);
        }elseif (session('cart.cart_type') == 'donation'){
            $campaign = Campaign::find(session('cart.campaign_id'));
        }
        
        //dd(session('cart'));
        return view('payment', compact('title', 'campaign'));
    }

    /**
     * @param Request $request
     * @return mixed
     *
     * Payment gateway PayPal
     */
    public function paypalRedirect(Request $request){
        if ( ! session('cart')){
            return view('checkout_empty', compact('title'));
        }
        //Find the campaign
        $cart = session('cart');

        $amount = 0;
        if(session('cart.cart_type') == 'reward'){
            $reward = Reward::find(session('cart.reward_id'));
            $amount = $reward->amount;
            $campaign = Campaign::find($reward->campaign_id);
        }elseif (session('cart.cart_type') == 'donation'){
            $campaign = Campaign::find(session('cart.campaign_id'));
            $amount = $cart['amount'];
        }
        $currency = get_option('currency_sign');
        $user_id = null;
        if (Auth::check()){
            $user_id = Auth::user()->id;
        }
        //Create payment in database


        $transaction_id = 'tran_'.time().str_random(6);
        // get unique recharge transaction id
        while( ( Payment::whereLocalTransactionId($transaction_id)->count() ) > 0) {
            $transaction_id = 'reid'.time().str_random(5);
        }
        $transaction_id = strtoupper($transaction_id);

        $payments_data = [
            'name' => session('cart.full_name'),
            'email' => session('cart.email'),

            'user_id'               => $user_id,
            'campaign_id'           => $campaign->id,
            'reward_id'             => session('cart.reward_id'),

            'amount'                => $amount,
            'payment_method'        => 'paypal',
            'status'                => 'initial',
            'currency'              => $currency,
            'local_transaction_id'  => $transaction_id,

            'contributor_name_display'  => session('cart.contributor_name_display'),
        ];
        //Create payment and clear it from session
        $created_payment = Payment::create($payments_data);
        $request->session()->forget('cart');

        // PayPal settings
        $paypal_action_url = "https://www.paypal.com/cgi-bin/webscr";
        if (get_option('enable_paypal_sandbox') == 1)
            $paypal_action_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";

        $paypal_email = get_option('paypal_receiver_email');
        $return_url = route('payment_success',$transaction_id);
        $cancel_url = route('checkout');
        $notify_url = route('paypal_notify', $transaction_id);

        $item_name = $campaign->title." [Contributing]";

        // Check if paypal request or response
        $querystring = '';

        // Firstly Append paypal account to querystring
        $querystring .= "?business=".urlencode($paypal_email)."&";

        // Append amount& currency (£) to quersytring so it cannot be edited in html
        //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
        $querystring .= "item_name=".urlencode($item_name)."&";
        $querystring .= "amount=".urlencode($amount)."&";
        $querystring .= "currency_code=".urlencode($currency)."&";

        $querystring .= "first_name=".urlencode(session('cart.full_name'))."&";
        //$querystring .= "last_name=".urlencode($ad->user->last_name)."&";
        $querystring .= "payer_email=".urlencode(session('cart.email') )."&";
        $querystring .= "item_number=".urlencode($created_payment->local_transaction_id)."&";

        //loop for posted values and append to querystring
        foreach(array_except($request->input(), '_token') as $key => $value){
            $value = urlencode(stripslashes($value));
            $querystring .= "$key=$value&";
        }

        // Append paypal return addresses
        $querystring .= "return=".urlencode(stripslashes($return_url))."&";
        $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
        $querystring .= "notify_url=".urlencode($notify_url);

        // Append querystring with custom field
        //$querystring .= "&custom=".USERID;

        // Redirect to paypal IPN
        header('location:'.$paypal_action_url.$querystring);
        exit();
    }

    /**
     * @param Request $request
     * @param $transaction_id
     *
     * Check paypal notify
     */
    public function paypalNotify(Request $request, $transaction_id){
        //todo: need to  be check
        $payment = Payment::whereLocalTransactionId($transaction_id)->where('status','!=','success')->first();

        $verified = paypal_ipn_verify();
        if ($verified){
            //Payment success, we are ready approve your payment
            $payment->status = 'success';
            $payment->charge_id_or_token = $request->txn_id;
            $payment->description = $request->item_name;
            $payment->payer_email = $request->payer_email;
            $payment->payment_created = strtotime($request->payment_date);
            $payment->save();
        }else{
            $payment->status = 'declined';
            $payment->description = trans('app.payment_declined_msg');
            $payment->save();
        }
        // Reply with an empty 200 response to indicate to paypal the IPN was received correctly
        header("HTTP/1.1 200 OK");
    }


    /**
     * @return array
     * 
     * receive card payment from stripe
     */
    public function paymentStripeReceive(Request $request){

        $user_id = null;
        if (Auth::check()){
            $user_id = Auth::user()->id;
        }

        $stripeToken = $request->stripeToken;
        \Stripe\Stripe::setApiKey(get_stripe_key('secret'));
        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $cart = session('cart');

            //Find the campaign
            $amount = 0;
            if(session('cart.cart_type') == 'reward'){
                $reward = Reward::find(session('cart.reward_id'));
                $amount = $reward->amount;
                $campaign = Campaign::find($reward->campaign_id);
            }elseif (session('cart.cart_type') == 'donation'){
                $campaign = Campaign::find(session('cart.campaign_id'));
                $amount = $cart['amount'];
            }
            $currency = get_option('currency_sign');

            //Charge from card
            $charge = \Stripe\Charge::create(array(
                "amount"        => ($amount * 100), // amount in cents, again
                "currency"      => $currency,
                "source"        => $stripeToken,
                "description"   => $campaign->title." [Contributing]"
            ));

            if ($charge->status == 'succeeded'){
                //Save payment into database
                $data = [
                    'name' => session('cart.full_name'),
                    'email' => session('cart.email'),
                    'amount' => ($charge->amount / 100 ),

                    'user_id'               => $user_id,
                    'campaign_id'           => $campaign->id,
                    'reward_id'             => session('cart.reward_id'),
                    'payment_method'        => 'stripe',
                    'currency'              => $currency,
                    'charge_id_or_token'    => $charge->id,
                    'description'           => $charge->description,
                    'payment_created'       => $charge->created,

                    //Card Info
                    'card_last4'        => $charge->source->last4,
                    'card_id'           => $charge->source->id,
                    'card_brand'        => $charge->source->brand,
                    'card_country'      => $charge->source->US,
                    'card_exp_month'    => $charge->source->exp_month,
                    'card_exp_year'     => $charge->source->exp_year,

                    'contributor_name_display'  => session('cart.contributor_name_display'),
                    'status'                    => 'success',
                ];

                Payment::create($data);

                $request->session()->forget('cart');
                return ['success'=>1, 'msg'=> trans('app.payment_received_msg'), 'response' => $this->payment_success_html()];
            }
        } catch(\Stripe\Error\Card $e) {
            // The card has been declined
            return ['success'=>0, 'msg'=> trans('app.payment_declined_msg'), 'response' => $e];
        }
    }
    
    public function payment_success_html(){
        $html = ' <div class="payment-received">
                            <h1> <i class="fa fa-check-circle-o"></i> '.trans('app.payment_thank_you').'</h1>
                            <p>'.trans('app.payment_receive_successfully').'</p>
                            <a href="'.route('home').'" class="btn btn-filled">'.trans('app.home').'</a>
                        </div>';
        return $html;
    }
    
    public function paymentSuccess(Request $request, $transaction_id = null){
        if ($transaction_id){
            $payment = Payment::whereLocalTransactionId($transaction_id)->whereStatus('initial')->first();
            if ($payment){
                $payment->status = 'pending';
                $payment->save();
            }
        }

        $title = trans('app.payment_success');
        return view('payment_success', compact('title'));
    }
    public function sslPayment(Request $request){
        if ( ! session('cart')){
            return view('checkout_empty', compact('title'));
        }
        //Find the campaign
        $cart = session('cart');
        $amount = 0;
        if(session('cart.cart_type') == 'reward'){
            $reward = Reward::find(session('cart.reward_id'));
            $amount = $reward->amount;
            $campaign = Campaign::find($reward->campaign_id);
        }elseif (session('cart.cart_type') == 'donation'){
            $campaign = Campaign::find(session('cart.campaign_id'));
            $amount = $cart['amount'];
        }
        $currency = get_option('currency_sign');
        $user_id = null;
        if (Auth::check()){
            $user_id = Auth::user()->id;
        }
        //Create payment in database


        $transaction_id = 'tran_'.time().str_random(6);
        // get unique recharge transaction id
        while( ( Payment::whereLocalTransactionId($transaction_id)->count() ) > 0) {
            $transaction_id = 'reid'.time().str_random(5);
        }
        $transaction_id = strtoupper($transaction_id);

        $payments_data = [
            'name'                  => session('cart.full_name'),
            'email'                 => session('cart.email'),
            'address'               => session('cart.address'),
            'phone'                 => session('cart.phone'),
            'user_id'               => $user_id,
            'campaign_id'           => $campaign->id,
            'reward_id'             => session('cart.reward_id'),
            'amount'                => $amount,
            'payment_method'        => 'sslcommerz',
            'status'                => 'initial',
            'currency'              => $currency,
            'local_transaction_id'  => $transaction_id,

            'contributor_name_display'  => session('cart.contributor_name_display'),
        ];
        $sslczconfig = config('sslwpayment');

        
        $post_data = array();
        $post_data['store_id'] = "oporajoyitprivatelimitedlive";
        $post_data['store_passwd'] = "5B0B915FD6D0343936";
        // $post_data['store_id'] = $sslczconfig['store_id'];
        // $post_data['store_passwd'] = $sslczconfig['store_password'];
        $post_data['total_amount'] = $amount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $payments_data['local_transaction_id'];
        $post_data['success_url'] = route($sslczconfig['redirect_url']['success']);
        $post_data['fail_url'] = route($sslczconfig['redirect_url']['fail']);
        $post_data['cancel_url'] = route($sslczconfig['redirect_url']['cancel']);
        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $payments_data['name'];
        $post_data['cus_email'] = $payments_data['email'];
        $post_data['cus_add1'] = $payments_data['address'];
        $post_data['cus_phone'] = $payments_data['phone'];

        $post_data['product_amount'] = $amount;
    
        # REQUEST SEND TO SSLCOMMERZ
        $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v3/api.php";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url );
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1 );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle );

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($code == 200 && !( curl_errno($handle))) {
            curl_close( $handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close( $handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true );

        if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
            //Create payment and clear it from session
            $created_payment = Payment::create($payments_data);
            $request->session()->forget('cart');
                # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
                # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            $notification = array(
                                    'message' => 'Data passing error', 
                                    'alert' => 'warning'
                                );
            return redirect()->back()->with( $notification);
        }

    }
    public function sslPaymentSuccessOrFailed(Request $request)
        {
            // dd($request);
            if($request->get('status') == 'CANCELLED') {
                $notification = array(
                                    'message' => 'Payment Canceled', 
                                    'alert' => 'warning'
                                );
                return redirect(route('checkout'))->with( $notification);
            }
            elseif($request->get('status') == 'VALID') {
                $transactionId = $request->get('tran_id');
                $payment = Payment::whereLocalTransactionId($transactionId)->whereStatus('initial')->first();
                if ($payment){
                    if($payment['amount'] == $request->get('amount')){
                                $payment->status = 'success';
                                
                            }
                    else{
                        $payment->status = 'partial';
                        $payment->amount = $request->get('amount');
                    }
                $payment->save();
                }
                $notification = array(
                                    'message' => 'Payment Received Successfully!', 
                                    'alert' => 'success'
                                );
            } else {
              $notification = array(
                                    'message' => 'Payment Received Field', 
                                    'alert' => 'warning'
                                );
            }
            

            return redirect(route('home'))->with( $notification);
        }

    public function wallitmixRedirect(Request $request){
        if ( ! session('cart')){
            return view('checkout_empty', compact('title'));
        }
        //Find the campaign
        $cart = session('cart');
        $amount = 0;
        if(session('cart.cart_type') == 'reward'){
            $reward = Reward::find(session('cart.reward_id'));
            $amount = $reward->amount;
            $campaign = Campaign::find($reward->campaign_id);
        }elseif (session('cart.cart_type') == 'donation'){
            $campaign = Campaign::find(session('cart.campaign_id'));
            $amount = $cart['amount'];
        }
        $currency = get_option('currency_sign');
        $user_id = null;
        if (Auth::check()){
            $user_id = Auth::user()->id;
        }
        //Create payment in database


        $transaction_id = 'tran_'.time().str_random(6);
        // get unique recharge transaction id
        while( ( Payment::whereLocalTransactionId($transaction_id)->count() ) > 0) {
            $transaction_id = 'reid'.time().str_random(5);
        }
        $transaction_id = strtoupper($transaction_id);

        $payments_data = [
            'name'                  => session('cart.full_name'),
            'email'                 => session('cart.email'),
            'address'                 => session('cart.address'),
            'phone'                 => session('cart.phone'),
            'user_id'               => $user_id,
            'campaign_id'           => $campaign->id,
            'reward_id'             => session('cart.reward_id'),
            'amount'                => $amount,
            'payment_method'        => 'walletmix',
            'status'                => 'initial',
            'currency'              => $currency,
            'local_transaction_id'  => $transaction_id,

            'contributor_name_display'  => session('cart.contributor_name_display'),
        ];
        //Create payment and clear it from session
        $created_payment = Payment::create($payments_data);
        $request->session()->forget('cart');
        $walletmix = NEW \App\Library\Walletmix;
        $walletmix->walletmixrec('oporajoyit_2134619461', 'oporajoyit_785193868', 'WMX5ab2222dbec89','604bf1e5d2bd0418b43453a44721e82a27fb71f7');
            $customer_info = array(
                "customer_name"     => $payments_data['name'],
                "customer_email"    => $payments_data['email'],
                "customer_add"      => $payments_data['address'],
                "customer_country"  => "Bangladesh",
                "customer_phone"    => $payments_data['phone'],
            );
            $shipping_info = array();
            $walletmix->set_shipping_charge('0');
            $walletmix->set_discount(0);
            $item_name = $campaign->title." [Contributing]";
            $product_1 = array('name' => $item_name,'price' => $amount,'quantity' => 1);
            $product_2 = array('name' => '','price' => '','quantity' => '');

            $products = array($product_1,$product_2);

            $walletmix->set_product_description($products);

            $walletmix->set_merchant_order_id($transaction_id);

            $walletmix->set_app_name('oporajoy.org');
            $walletmix->set_currency('BDT');
            $walletmix->set_callback_url(route('walletmixcb'));

            $extra_data = array();

            //if you want to send extra data then use this way
            //$extra_data = array('param_1' => 'data_1','param_2' => 'data_2','param_3' => 'data_3');

            $walletmix->set_extra_json($extra_data);

            $walletmix->set_transaction_related_params($customer_info);
            $walletmix->set_transaction_related_params($shipping_info);

            $walletmix->set_database_driver('session'); // options: "txt" or "session"

            $walletmix->send_data_to_walletmix();

    }

    public function walletmixcb(){
        $walletmix = NEW \App\Library\Walletmix;
        $walletmix->walletmixrec('oporajoyit_2134619461', 'oporajoyit_785193868', 'WMX5ab2222dbec89','604bf1e5d2bd0418b43453a44721e82a27fb71f7');

            $walletmix->set_database_driver('session'); // options: "txt" or "session"
            csrf_token();
            if(isset($_POST['merchant_txn_data'])){
                $merchant_txn_data = json_decode($_POST['merchant_txn_data']);
                
                $walletmix->get_database_driver();
                
                if($walletmix->get_database_driver() == 'txt'){
                    $saved_data = json_decode($walletmix->read_file());
                }elseif($walletmix->get_database_driver() == 'session'){
                    // Read data from your database
                    $saved_data = json_decode($walletmix->read_data());
                }
                
                if($merchant_txn_data->token === $saved_data->token){
                    
                    $wmx_response = json_decode($walletmix->check_payment($saved_data));
                    $walletmix->debug($wmx_response, false);
                    if( ($wmx_response->wmx_id == $saved_data->wmx_id) ){
                        if( ($wmx_response->txn_status == '1000') ){
                            if( ($wmx_response->bank_amount_bdt >= $saved_data->amount) ){
                                if( ($wmx_response->merchant_amount_bdt == $saved_data->amount) ){
                                $notification = array(
                                            'message' => 'Update merchant database with success. amount : '.$wmx_response->bank_amount_bdt, 
                                            'alert' => 'success'
                                        );  
                                    if ($transaction_id){
                                            $payment = Payment::whereLocalTransactionId($transaction_id)->whereStatus('initial')->first();
                                            if ($payment){
                                                $payment->status = 'pending';
                                                $payment->save();
                                            }
                                        }

                                        $title = trans('app.payment_success');
                                        return view('payment_success', compact('title'));
                                }else{
                                    $notification = array(
                                            'message' => 'Merchant amount mismatch Merchant Amount : '.$saved_data->amount.' Bank Amount : '.$wmx_response->bank_amount_bdt.'. Update merchant database with success', 
                                            'alert' => 'success'
                                        );
                                }
                            }else{
                                $notification = array(
                                    'message' => 'Bank amount is less then merchant amount like partial payment.You can make it failed transaction.', 
                                    'alert' => 'warning'
                                );
                            }
                        }else{
                            $notification = array(
                                    'message' => 'Update merchant database with failed', 
                                    'alert' => 'warning'
                                );
                        }
                    }else{
                        $notification = array(
                                    'message' => 'Merchant ID Mismatch', 
                                    'alert' => 'warning'
                                );
                    }
                }else{
                    $notification = array(
                                    'message' => 'Token mismatch', 
                                    'alert' => 'warning'
                                );
                }
            }else{
                $notification = array(
                                    'message' => 'Try to direct access', 
                                    'alert' => 'warning'
                                );
            }
        return redirect(route('home'))->with( $notification);  
    }
    public function comment($id = null)
    {
        $comments = Comment::all();
        $title = 'Comments Section';
       return view('admin.comment', compact('comments', 'title'));
    }
    public function commentstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|min:3|max:200',
        ]);

        if ($validator->fails()) {
           $notification = array(
                'message' => 'Comment must be minimum 3 or maximum 200 characters', 
                'alert' => 'warning'
            ); 
        }
        else{
            $campaign = Campaign::find($request->id);

            $user = Auth::user()->id;

            $comment = new Comment();
            $comment->comment = $request->comment;
            // if($request->commentid){
            //     $comment->comment_id = $request->commentid;
            // }
            $comment->approved = false;
            $comment->campaign()->associate($campaign);
            $comment->user()->associate($user);

            $comment->save();

            $notification = array(
                'message' => 'Your comment will be visiable after approved by Authority', 
                'alert' => 'success'
            );
        }
        return json_encode($notification);
    }

    public function commentActive(Request $request){
        $comment = Comment::find($request->id);
        $comment->approved = $request->status;
         $comment->save();
         $notification = array(
            'message' => 'Comment '.$request->message.' Successfully!', 
            'alert' => 'success'
        );
        return json_encode($notification);
    }


    public function likestore(Request $request)
    {
        $res= false; $msg = '';
        if(auth::check()){
        if($request->input('post_id')){
            $post_id = $request->input('post_id');
            $user_id = Auth::user()->id;

            $user = User::find(Auth::user()->id);
            if(count($user)>0){
                $post = Post::find($post_id);
                if(count($post)>0){
                  $likes = Like::where('post_id', '=', $post_id)->where('user_id', '=', $user_id)->get();
                  if(count($likes)>0){
                    $msg = "Like already Stored";
                  }else{
                    $like = new Like();
                    $like->status = 'Like';
                    $like->post()->associate($post);
                    $like->user()->associate($user);
                    $res = $like->save();
                    $msg = "Like Stored";
                  }
                }
            }else{
              $msg = "Please try again";
            }
          }else{
            $msg = "Please try again";
          }
        }
        else {
          $msg = "Please Login";
        }
          $response = array( 'status' => $res, 'msg' => $msg, );
          echo  json_encode($response);
    }


}
