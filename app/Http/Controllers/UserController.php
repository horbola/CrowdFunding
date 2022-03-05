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
        return view('user.users-panel')->with(compact('request'));
    }
    
    public function indexAllUsers() {
        // User::all() returns a collection instance on which there is no pagination.
        $users = User::paginate(4);
        return view('user.users', compact('users'));
    }
    
    public function indexBlockedUsers() {
        // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left
        $users = User::whereActiveStatus(3)->get();
        return view('user.users', compact('users'));
    }
    
    public function indexActiveUsers() {
        // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left
        $users = User::whereActiveStatus(1)->get();
        return view('user.users', compact('users'));
    }
    
    public function indexMalicousUsers() {
        $users = User::whereActiveStatus(2)->get();
        return view('user.users', compact('users'));
    }
    
    public function indexLeftUsers() {
        $users = User::whereActiveStatus(4)->get();
        return view('user.users', compact('users'));
    }
    
    
    
    
    
    
    public function indexGuests() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('guest');
        });
        return view('user.users', compact('users'));
    }
    
    public function indexDonors() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('donor');
        });
        return view('user.users', compact('users'));
    }
    
    public function indexCampaigners() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('campaigner');
        });
        return view('user.users', compact('users'));
    }
    
    public function indexVolunteerRequests() {
        $users = User::whereIsVolunteer(1)->get();
        return view('user.users', compact('users'));
    }
    
    public function indexVolunteers() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('volunteer');
        });
        return view('user.users', compact('users'));
    }
    
    public function indexStaffs() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('staff');
        });
        return view('user.users', compact('users'));
    }
    
    public function indexSuper() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('super');
        });
        return view('user.users', compact('users'));
    }
    
    
    
    
    
    
    public function indexTopDonors() {
        return view('user.users', compact('users'));
    }
    
    public function indexTopActives() {
        return view('user.users', compact('users'));
    }
    
    public function indexTopSupporters() {
        return view('user.users', compact('users'));
    }
    
    public function indexTopVisiters() {
        return view('user.users', compact('users'));
    }
    

    
    
    /**
     * 
     * @param type $userID
     * 
     * shows a single user's details
     */
    public function show(Request $request, $id=0) {
        $user = Auth::user();
        // if there's an id means this request is coming from admin
        // else is coming from client.
        if($id){
            $user = User::find($id);
        }
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
        
        return view('user.profile')->with(compact('request', 'user'));
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
    public function edit(Request $request, $id=0) {
        $user = Auth::user();
        // if there's an id means this request is coming from admin
        // else is coming from client.
        if($id && $user->id !== $id){
            $user = User::find($id);
        }
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
        return view('user.profile-edit')->with(compact('request', 'user', 'countries'));
    }
    
    
    public function update(Request $req, $id=0) {
        $user = Auth::user();
        // if there's an id means this request is coming from admin
        // else is coming from client.
        if($id){
            $user = User::find($id);
        }
        //* $inputs = Arr::except($req->input(), ['_token', 'photo']);
        
        $rules = [
            'name' => 'string:255',
            'gender' => 'String:10',
            'phone' => 'numeric',
            'website' => 'string:255',
            'country_id' => 'numeric',
        ];
        $validated = $req->validate($rules);
        
        $user->name = $validated['name'];
        $user->gender = $validated['gender'];
        $user->address->phone = $validated['phone'];
        $user->address->website = $validated['website'];
        $user->address->country_id = $validated['country_id'];
        $saved = $user->push();

        // $req->user_panel_fraction = 'alls';
        if($saved){
            if(Auth::user()->id !== $id){
                // returns to users table in admin panel from this 'if block'
                // the 'user_panel_fraction' is uploaded from user-panel blade
                // so that after updating user information the admin can go to 
                // the appropriate original section of user-panel.
                return redirect('/dashboard/admin/users-panel/' . $req->user_panel_fraction)->with('success', $req->profileItem . ' has been updated');
            }
            else {
                // returns to client profile from this else block
                return redirect(route('user.show'))->with('success', $req->profileItem . ' has been updated');
            }
        }
        return back()->with('error', 'sorry the changes you are trying to make couldn\'t be possible');
    }
    
    public function updatePhoto(Request $req, $id=0) {
        $user = Auth::user();
        // if there's an id means this request is coming from admin
        // else is coming from client.
        if($id){
            $user = User::find($id);
        }
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
     * 0:pending, 1:active, 2:malicous, 3:blocked, 4:left, 5:paused
     * active_status is set to 5. resuming means setting it back to 1
     */
    public function updateActivation(Request $request) {
        $user = Auth::user();
        $user->active_status = 1;
        $user->update();
        return redirect(route('home'));
    }
    
    /*
     * pauses the account. because of this user can never retrieve the account
     */
    public function updateDeletion(Request $request) {
        $user = Auth::user();
        $user->active_status = 4;
        $user->update();
        Auth::logout();
        return redirect('/');
    }
    
    /*
     * pauses the account. because of this user can retrieve the account latter
     */
    public function updatePausing(Request $request) {
        $user = Auth::user();
        $user->active_status = 5;
        $user->update();
        Auth::logout();
        return redirect('/');
    }
    

    
    /**
     * admin deletes an user from database
     */
    public function destroy() {}
}
