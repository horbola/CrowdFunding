<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Notifications\TwoFactorCode;
use App\Http\Controllers\DonationController;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    
    
    protected function authenticated(Request $request, $user){
        // these two lines sometimes breaks laravel's default intended route redirection
//        $user->generateTwoFactorCode();
//        $user->notify(new TwoFactorCode());
        
        // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left, 5:paused
        if($user->active_status === 4){
            return view('auth.deleted-account');
        }
        
        if($user->active_status === 5){
            return view('auth.paused-account');
        }
        
        $intendedUrl = redirect()->intended()->getTargetUrl();
        // the page from which user logs in. the the url for this
        // idle page is seved to session from the 'layout.face.skel' page
        $idlePage = session('idlePage');
        // this if block works if laravel's default intended route direction is active
//        if( !$intendedUrl || ($intendedUrl === URL::to('/') ) ){
//            if ( $idlePage && ($idlePage !== URL::to('/'))) {
//                return redirect(session('idlePage'));
//            }
//        }
        
        // this if block works if laravel's default intended route direction is not active
        // this is alternative to the previous if block.
        if( $intendedUrl && ($intendedUrl !== URL::to('/') ) ){
            return redirect($intendedUrl);
        }
        else if ( $idlePage && ($idlePage !== URL::to('/'))) {
            return redirect(session('idlePage'));
        }
    }

}
