<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }


    public function store() {
        
    }
    
    /**
     * whenever user or admin wants to see cart
     * then they always open it in edit mode.
     * that's why no index method is used here
     */
    public function edit() {
        
    }
    
    
    public function update() {
        
    }
    
    
    public function destroy() {
        
    }
    
    /**
     * when an user add product into cart this method
     * checks first whether there is any cart created
     * in the cart table for that user. if there is none 
     * then this method first calls this store method
     * which creates the only cart for that user and 
     * returns the cart id. then this method calls this
     * update method to store that product into cartItem
     * table together with the cart id returned by previous
     * method.
     * 
     * but if there is a cart already there then store method
     * just retrieves the cart id and returns for latter 
     * processing
     */
    public function add() {
        
    }

}
