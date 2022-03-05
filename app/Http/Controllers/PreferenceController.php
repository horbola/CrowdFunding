<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;



class PreferenceController extends Controller
{
    public function index() {
        $title = 'User Preferences';
        $menuName = 'preferences';
        return view('user.preferences', compact('title', 'menuName'));
    }
    
    public function createPassReset() {
        $title = 'Reset Password';
        $menuName = 'preferences';
        return view('user.passReset', compact('title', 'menuName'));
    }
    
    public function updatePassReset() {
        $validated = request()->validate($this->rules());
        $user = Auth::user();
        $this->setUserPassword($user, $validated['old_pass'], $validated['password']);
        $user->save();
        return redirect(route('preference.index'));
    }
    
    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'old_pass' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }
    
    /**
     * Set the user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function setUserPassword($user, $oldPass, $password)
    {
        if (Hash::check($oldPass, $user->password)) {
            $user->password = Hash::make($password);
        }
        else back()->with('error', 'passwords doesn\'t match');
    }

}
