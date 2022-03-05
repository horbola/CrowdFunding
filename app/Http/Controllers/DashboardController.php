<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * shows the client's and vendor's dashboard
     */
    public function indexClientDashB() {
        return view('dashboard');
    }
    
    
    /**
     * shows the admin's dashboard
     */
    public function indexAdminDashB() {
        return view('admin.dashboard');
    }
    
    /**
     * shows the admin's dashboard summary
     */
    public function indexDashBSummary() {
        return view('admin.partial.dashboard.summary');
    }
}
