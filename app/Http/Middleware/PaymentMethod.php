<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PaymentMethod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        dd('insise middleware');
        if( !Auth::user()->currentPayMeth() ){
            return view('fund.add-pay-meth')->with('error', 'You don\'t have setup any bank information for your current transaction. Please setup one to withdraw money.');
        }
        
        return $next($request);
    }
}
