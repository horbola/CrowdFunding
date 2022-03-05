<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatformController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }
    
    
    public function indexPlatformPanel(){
        return view('platform.platform-panel');
    }
    
    public function indexPlatformSettings(){
        return view('platform.platform-settings');
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
