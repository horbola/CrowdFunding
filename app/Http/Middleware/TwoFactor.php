<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;

class TwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user = auth()->user();
        $release = !$user->hasCampaign() && (!$user->is_volunteer || !$user->is_admin || !$user->is_super);
        if (auth()->check() && $user->two_factor_code && !$release) {
            if ($user->two_factor_expires_at->lt(now())) {
                $user->resetTwoFactorCode();
                auth()->logout();
                return redirect()->route('login')->withMessage('The two factor code has expired. Please login again.');
            }

            if (!$request->is('verify*')) {
                session(['twoFactorCurrentRoute' => URL::current()]);
                return redirect()->route('verify.index');
            }
        }

        return $next($request);
    }

}
