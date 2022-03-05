<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        $menuName = 'investigate';
        $title = '';
        if( (int)Auth::user()->is_admin !== 1 ){
            return response()->view('platform.admin-check', compact('title', 'menuName'));
        }
        return $next($request);
    }
}
