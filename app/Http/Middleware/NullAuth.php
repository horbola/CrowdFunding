<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NullAuth
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
        $menuName = 'investigate';
        $title = '';
        
        if(!Auth::user())
            return response()->view('auth.null-auth', compact('title', 'menuName'));
        return $next($request);
    }
}
