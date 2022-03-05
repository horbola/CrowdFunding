<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller {

    public function facebookRedirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook() {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/home');
            } else {
                $createUser = User::create([
                            'name' => $user->name,
                            'email' => $user->email,
                            'fb_id' => $user->id,
                            'password' => encrypt('admin@oporajoy123')
                ]);

                Auth::login($createUser);
                return redirect('/home');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
    
    
    
    
    
    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle() {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/home');
            } else {
                $createUser = User::create([
                            'name' => $user->name,
                            'email' => $user->email,
                            'google_id' => $user->id,
                            'password' => encrypt('admin@oporajoy123')
                ]);

                Auth::login($createUser);
                return redirect('/home');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

}
