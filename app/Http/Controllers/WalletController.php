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

    /**
     * indexes wallets of all users to admin panel
     */
    public function index() {
        return view('fund.wallets');
    }
    
    /**
     * shows a campaigner's wallet
     */
    public function showCampaignerWallet() {
        return view('fund.wallet');
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
