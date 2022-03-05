<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }
    
    
    
    public function index(Request $request) {
        return view('admin.settings')->with('page', 'admin settings', 'request');
    }


    
    public function showClientSettings(Request $request, $userID) {
        return view('dashboard.settings')->with('page', 'clients settings', 'request');
    }
    
    
    public function update() {
        
    }
}
