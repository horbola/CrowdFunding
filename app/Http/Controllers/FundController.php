<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundController extends Controller
{
    
    public function indexFundPanel() {
        return view('fund.fund-panel');
    }
}
