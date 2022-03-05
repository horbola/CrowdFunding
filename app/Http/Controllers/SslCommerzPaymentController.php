<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Payment;
use App\Models\Address;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Library\SslCommerz\SslCommerzNotification;


class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout(Request $request)
    {
        return view('ssl.exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('ssl.exampleHosted');
    }

    public function index(Request $request)
    {
        Log::debug('index entered');
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
        Log::debug('index ends');

    }

    public function payViaAjax(Request $request){
        Log::debug('payViaAjax entered');
        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $cart_php = json_decode($request->cart_json);
        Log::debug($cart_php->amount);
        
        $user = Auth::user();
        Log::debug($user->name);
        
        $userExtra = $user->userExtra;
        Log::debug($user->name);
        
        $address = $user->currentAddress();
        Log::debug($address->toString());
        
        $country = $address->country;
        Log::debug($country->nicename);
        
        $campaign = Campaign::find($cart_php->campaign_id);
        Log::debug($campaign->short_description);
        
        $category = $campaign->category;
        Log::debug($category->category_name);
        
        
        $post_data = array();
        $post_data['total_amount'] = $cart_php->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $user->name;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_add1'] = $address->toString();
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = $address->city;
        $post_data['cus_state'] = $address->division;
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = $country->nicename;
        $post_data['cus_phone'] = $userExtra->phone;
        $post_data['cus_fax'] = "";
        
        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Not Applicable";
        $post_data['ship_add1'] = "Not Applicable";
        $post_data['ship_add2'] = "Not Applicable";
        $post_data['ship_city'] = "Not Applicable";
        $post_data['ship_state'] = "Not Applicable";
        $post_data['ship_postcode'] = "Not Applicable";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Not Applicable";

        $post_data['shipping_method'] = "Not Applicable";
        $post_data['product_name'] = $campaign->short_description;
        $post_data['product_category'] = $category->category_name;
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment donation and payment status need to update as Pending.
//        $donation_id = $cart_php->donation_id;
        Log::debug($request->cart_json);
        $donation = null;
        if(isset($cart_php->donation_id)){
            $donation = Donation::find($cart_php->donation_id);
        }
        else {
            Log::debug('else endtered');
            $data = [
                'user_id' => Auth::user()->id,
                'campaign_id' => $campaign->id,
            ];
            $donation = Donation::create($data);
        }
        
        $update_payment = Payment::where('trans_id', $post_data['tran_id'])
            ->updateOrInsert([
                'donation_id' => $donation->id,
                // 'payment_meth_type' => $request->payment_method,
                // 'payment_meth_id' => $request->payment_method,
                'amount' => $post_data['total_amount'],
                'currency' => $post_data['currency'],
                'trans_id' => $post_data['tran_id'],
                'status' => 'Pending',
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');
        Log::debug('payments options are: '. $payment_options);

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
        Log::debug('payViaAjax ends');

    }

    public function success(Request $request)
    {
        Log::debug('success entered');
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        Log::debug($tran_id);
        #Check order status in order tabel against the transaction id or order id.
        $payment_details = Payment::where('trans_id', $tran_id)->select('trans_id', 'status', 'currency', 'amount')->first();

        if ($payment_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_payment = Payment::where('trans_id', $tran_id)->update(['status' => 'Processing']);
                echo "<br >Transaction is successfully Completed";
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_payment = Payment::where('trans_id', $tran_id)->update(['status' => 'Failed']);
                echo "validation Fail";
            }
        } else if ($payment_details->status == 'Processing' || $payment_details->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }
        Log::debug('success ends');

    }

    public function fail(Request $request)
    {
        Log::debug('fail entered');
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
        Log::debug('fail ends');

    }

    public function cancel(Request $request)
    {
        Log::debug('cancel entered');
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
        Log::debug('cancel ends');

    }

    public function ipn(Request $request)
    {
        Log::debug('ipn entered');
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
        Log::debug('ipn ends');
    }

}
