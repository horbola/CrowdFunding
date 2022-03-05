<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    
    /**
     * shows all users.
     */
    public function indexUsers() {
        return view('admin.partial.dashboard.users');
    }
    
    /**
     * 
     * @param type $userID
     * 
     * shows a single user's details
     */
    public function show($userID) {
        return view('partial.dashboard.profile')->with('page', 'dashboard-profile');
    }
    
    /**
     * generates a register form
     */
    public function create() {
        
    }
    
    /**
     * make a new user entry in the users table
     */
    public function store() {
        // create an user entry in users table
        // send a 'verify email' link to the email registerd
    }
    
    /**
     * admin gets edit user form
     */
    public function edit() {
        
    }
    
    
    public function update() {
        
    }
    
    /**
     * admin deletes an user from database
     */
    public function destroy() {
        
    }

}
