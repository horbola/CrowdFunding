<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * 
 */
class AppController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * returns home page
     */
    public function index() {
        return view('home');
    }
    
    /**
     * works in response to createLogin()
     */
    public function show() {
        // store login credential as property
        // if 2 step varification is not enabled and
        // if user logs in successfully then show the orig page or current page or home page
        // but if 2 step is enabled and there is no 2 step code property
        // then call this.create2StepCope()
        // else check if codes match
        // if do login user else call this.create2StepCope() 
    }
    
    /**
     * responds to email verification link
     * matches the codes from UserController.store() and from other route which require email verification with this.createVerifiedLogin()
     * then returns the orig page or current page or home page
     */
    public function showVerified() {
        
    }
    
    /**
     * sends the login form and call this.show() in response
     */
    public function createLogin() {
        return view('auth.login');
    }
    
    public function createVerifiedLogin() {
        return view('auth.login')->with(['code1' => code1, 'code2' => code2]);
    }
    
    /**
     * sends 2 step verification code through mail and
     * saves it in property and then
     * return 2 step verification code entry form
     */
    public function create2StepCode() {
        
    }
    
    
    /**
     * returns the email page from which user can select to which mail the link to send
     */
    public function editPasswordEmail() {
        return view('reset-pass-email');
    }

    /**
     * sends an edit password link from edit password email page and
     * from resend command from in password email page
     */
    public function editPassword() {
        return view('reset-pass');
    }
    
    /**
     * responds to reset-pass view
     * saves new password into users table
     */
    public function updatePassword() {
        
    }
    
    /**
     * logs out user
     */
    public function destroy() {
        
    }

}
