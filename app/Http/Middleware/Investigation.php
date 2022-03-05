<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Investigation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        $menuName = 'investigate';
        if( (int)Auth::user()->is_volunteer === 1 ){
            $title = 'Requested To Be A Volunteer';
            return response()->view('investigation.requested-for-volunteer', compact('title', 'menuName'));
        }
        else if( (int)Auth::user()->is_volunteer !== 2 ){
            $title = 'Not Volunteer';
            return response()->view('investigation.already-a-volunteer', compact('title', 'menuName'));
        }
        return $next($request);
    }

}
