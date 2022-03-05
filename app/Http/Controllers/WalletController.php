<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    public function index() {
        
    }
    
    /**
     * shows a campaigner's wallet
     */
    public function showCampaignerWallet($userID) {
        return view('partial.dashboard.wallet')->with('page', 'campaigners wallet');
    }
    
    
    public function create() {
        
    }
    
    
    public function store() {
        
    }
    
    
    public function edit() {
        
    }
    
    
    public function update() {
        
    }
    
    
    public function destroy() {
        
    }

}
