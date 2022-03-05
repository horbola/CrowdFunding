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
        $title = 'Platform Panel';
        $menuName = 'platform';
        return view('platform.platform-panel', compact('title', 'menuName'));
    }
    
    public function indexPlatformSettings(){
        $title = 'Platform Panel';
        $menuName = 'platform';
        return view('platform.platform-settings', compact('title', 'menuName'));
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
