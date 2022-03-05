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
    
    
    public function showClientSettings() {
        return view('partial.dashboard.settings')->with('page', 'clients settings');
    }

    public function update() {
        
    }
}
