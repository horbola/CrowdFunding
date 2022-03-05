<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Country;





class UserController extends Controller {

    /**
     * shows users panel from which different types of users will viewed.
     */
    public function indexUsersPanel(Request $request) {
        return view('admin.users-panel')->with(compact('request'));
    }
    
    public function indexAllUsers() {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    
    public function indexBlockedUsers() {
        // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left
        $users = User::whereActiveStatus(3)->get();
        return view('admin.users', compact('users'));
    }
    
    public function indexActiveUsers() {
        // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left
        $users = User::whereActiveStatus(1)->get();
        return view('admin.users', compact('users'));
    }
    
    public function indexMalicousUsers() {
        $users = User::whereActiveStatus(2)->get();
        return view('admin.users', compact('users'));
    }
    
    public function indexLeftUsers() {
        $users = User::whereActiveStatus(4)->get();
        return view('admin.users', compact('users'));
    }
    
    
    
    
    
    
    public function indexGuests() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('guest');
        });
        return view('admin.users', compact('users'));
    }
    
    public function indexDonors() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('donor');
        });
        return view('admin.users', compact('users'));
    }
    
    public function indexCampaigners() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('campaigner');
        });
        return view('admin.users', compact('users'));
    }
    
    public function indexVolunteerRequests() {
        $users = User::whereIsVolunteer(1)->get();
        return view('admin.users', compact('users'));
    }
    
    public function indexVolunteers() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('volunteer');
        });
        return view('admin.users', compact('users'));
    }
    
    public function indexStaffs() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('staff');
        });
        return view('admin.users', compact('users'));
    }
    
    public function indexSuper() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('super');
        });
        return view('admin.users', compact('users'));
    }
    
    
    
    
    
    
    public function indexTopDonors() {
        return view('admin.users', compact('users'));
    }
    
    public function indexTopActives() {
        return view('admin.users', compact('users'));
    }
    
    public function indexTopSupporters() {
        return view('admin.users', compact('users'));
    }
    
    public function indexTopVisiters() {
        return view('admin.users', compact('users'));
    }
    

    
    
    /**
     * 
     * @param type $userID
     * 
     * shows a single user's details
     */
    public function show(Request $request) {
        $user = Auth::user();
        //$address = Address::where('user_id', $user->id)->get();
        $user->user_type = $user->roleDesc('super', 'staff', 'voluntier', 'campaigner', 'donor', 'guest');

        if(!$user->gender){
            $user->gender = 'Not Defined';
        }
        
        if(!$user->address->phone){
            $user->phone = 'Not Provided';
        }else $user->phone = $user->address->phone;
        
        if(!$user->address->website){
            $user->website = 'Not Provided';
        }else $user->website = $user->address->website;
        
        if($user->address->country && $user->address->country->nicename){
            $user->countryNiceName = $user->address->country->nicename;
        }
        else {
            $user->countryNiceName = 'Not Provided';
        }
        return view('dashboard.profile')->with(compact('request', 'user'));
    }
    
    public function showAdmin() {
        return view('admin.profile')->with('page', 'admin-profile');
    }
    
    /**
     * generates a register form
     */
    public function create() {}

    
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
        $user = Auth::user();
        $user->user_type = $user->roleDesc('super', 'staff', 'voluntier', 'campaigner', 'donor', 'guest');

        if (!$user->gender){
            $user->gender = 'Not Defined';
        }

        if(!$user->address->phone){
            $user->phone = 'Not Provided';
        }else $user->phone = $user->address->phone;
        
        if(!$user->address->website){
            $user->website = 'Not Provided';
        }else $user->website = $user->address->website;
        //dd($user);
        $countries = Country::all();

        if($user->address->country && $user->address->country->nicename){
            $user->countryNiceName = $user->address->country->nicename;
        }
        else {
            $user->countryNiceName = 'Not Provided';
        }
        // return view('dashboard.profile-edit')->with('user', $user);
        return view('dashboard.profile-edit')->with(compact('user', 'countries'));
    }
    
    
    public function update(Request $req) {
        $user = Auth::user();
        $inputs = Arr::except($req->input(), ['_token', 'photo']);
        $user->name = $inputs['name'];
        $user->gender = $inputs['gender'];
        $user->address->phone = $inputs['phone'];
        $user->address->website = $inputs['website'];
        $user->address->country_id = $inputs['country_id'];
        $saved = $user->push();
        
        if($saved){
            return redirect(route('user.show'))->with('success', $req->profileItem.' has been updated');
        }
        return back()->with('error', 'sorry the changes you are trying to make couldn\'t be possible');
    }
    
    public function updatePhoto(Request $req) {
        $user = Auth::user();
        $rules = ['avatar' => 'mimes:jpeg,jpg,png'];
        $this->validate($req, $rules);
        
        $image = $req->file('avatar');
        $image_base_name = str_replace('.' . $image->getClientOriginalExtension(), '', $image->getClientOriginalName());
        $image_name = strtolower(time().Str::random(5).'-'.Str::slug($image_base_name)).'.' . $image->getClientOriginalExtension();
        
        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $avatarPath = 'uploads/avatar/';
        $avatarFullPath = $publicPath.'/'.$avatarPath;
        $imagePublicPath = $avatarPath.$image_name;
        $dbPath = '/'.$imagePublicPath;
        
        if (!file_exists($avatarFullPath)) {
            mkdir($avatarFullPath, 0777, true);
        }
        
        $resized = Image::make($image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        
        try {
            // Uploading avatar
            $resized->save($imagePublicPath);
            $previous_photo = $user->photo;
            $user->photo = $dbPath;
            $user->update();
            if ($previous_photo && file_exists($publicPath.$previous_photo)) {
                unlink($publicPath.$previous_photo);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $user->refresh();
        if($req->hasFile('avatar')){
            return redirect(route('user.show'))->with(['success' => $req->profileItem.' has been updated', 'user' => $user]);
        }
        return back()->with('error', 'sorry the changes you are trying to make couldn\'t be possible');
    }
    
    
    /*
     * not used. remove latter
    */
    public function updatePrev(Request $req) {
        $user = Auth::user();
        $data = [
            $req->profileItem => $req->profileValue,
        ];
        $update = User::whereId($user->id)->update($data);
        if($update){
            return redirect(route('user.showProfile', $user->id))->with('success', $req->profileItem.'has been updated');
        }
        return back()->with('error', 'sorry the '.$req->editItem.' you are trying to update couldn\'t be possible');
    }
    
    /**
     * admin deletes an user from database
     */
    public function destroy() {}
}
