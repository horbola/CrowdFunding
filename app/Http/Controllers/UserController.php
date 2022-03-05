<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Country;
use App\Models\Donation;
use App\Models\Campaign;





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
        $users = User::whereActiveStatus(3)->paginate(4);
        return view('user.users', compact('users'));
    }
    
    public function indexActiveUsers() {
        // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left
        $users = User::whereActiveStatus(1)->paginate(4);
        return view('user.users', compact('users'));
    }
    
    public function indexMalicousUsers() {
        $users = User::whereActiveStatus(2)->paginate(4);
        return view('user.users', compact('users'));
    }
    
    public function indexLeftUsers() {
        $users = User::whereActiveStatus(4)->paginate(4);
        return view('user.users', compact('users'));
    }
    
    public function indexPausedUsers() {
        $users = User::whereActiveStatus(5)->paginate(4);
        return view('user.users', compact('users'));
    }
    
    
    
    
    
    
    public function indexGuests() {
        $users = User::all()->filter(function($user, $key){
            return $user->hasRole('guest');
        });
        return view('user.users', compact('users'));
    }
    
    public function indexDonors() {
        $donations = Donation::all()->unique('user_id');
        $users = $donations->map(function($donation, $key){
            return $donation->donor;
        });
        return view('user.users', compact('users'));
    }
    
    public function indexCampaigners() {
        $campaigns = Campaign::all()->unique('user_id');
        $users = $campaigns->map(function($campaign, $key){
            return $campaign->campaigner;
        });
        return view('user.users', compact('users'));
    }
    
//    public function indexCampaigners() {
//        $users = User::all()->filter(function($user, $key){
//            return $user->hasRole('campaigner');
//        });
//        return view('user.users', compact('users'));
//    }
//    
    public function indexVolunteerRequests() {
        $users = User::whereIsVolunteer(1)->get();
        return view('user.users', compact('users'));
    }
    
    public function indexVolunteers() {
        $users = User::whereIsVolunteer(2)->get();
        return view('user.users', compact('users'));
    }
    
    public function indexStaffs() {
        $users = User::whereIsAdmin(1)->get();
        return view('user.users', compact('users'));
    }
    
    public function indexSuper() {
        $users = User::whereIsSuper(1)->get();
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
        $title = 'Dashboard';
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
        
        if(!$user->userExtra->phone){
            $user->phone = 'Not Provided';
        }else $user->phone = $user->userExtra->phone;
        
        
        if($user->currentAddress()->country && $user->currentAddress()->country->nicename){
            $user->countryNiceName = $user->currentAddress()->country->nicename;
        }
        else {
            $user->countryNiceName = 'Not Provided';
        }
        
        return view('user.profile')->with(compact('request', 'user', 'title'));
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
        $title = 'Edit Profile';
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

        if(!$user->currentAddress()->phone){
            $user->phone = 'Not Provided';
        }else $user->phone = $user->currentAddress()->phone;
        
        
        $countries = Country::all();

        if($user->currentAddress()->country && $user->currentAddress()->country->nicename){
            $user->countryNiceName = $user->currentAddress()->country->nicename;
        }
        else {
            $user->countryNiceName = 'Not Provided';
        }
        // return view('dashboard.profile-edit')->with('user', $user);
        return view('user.profile-edit')->with(compact('request', 'user', 'countries', 'title'));
    }
    
    
    public function update(Request $request, $id=0) {
        $user = Auth::user();
        // if there's an id means this request is coming from admin
        // else is coming from client.
        if($id){
            $user = User::find($id);
        }
        //* $inputs = Arr::except($req->input(), ['_token', 'photo']);
        
        $rules = [
            'name' => 'string:255',
            'birth_date' => 'date',
            'gender' => 'string:10',
            'phone' => 'numeric',
            'nid' => 'numeric',
            'email' => 'email',
            'facebook' => 'string:50',
            'twitter' => 'string:50',
            
            'current_holding' => 'string:30',
            'current_road' => 'string:30',
            'current_post_code' => 'string:30',
            'current_upazilla' => 'string:30',
            'current_district' => 'string:30',
            'current_country' => 'numeric',
            
            'permanent_holding' => 'string:30',
            'permanent_road' => 'string:30',
            'permanent_post_code' => 'string:30',
            'permanent_upazilla' => 'string:30',
            'permanent_district' => 'string:30',
            'permanent_country' => 'numeric',
            
            'careof' => 'string:255',
            'careof_phone' => 'numeric',
        ];
        $validated = $request->validate($rules);

        
        if(isset($validated['name'])) $user->name = $validated['name'];
        if(isset($validated['birth_date'])) $user->userExtra->birth_date = $validated['birth_date'];
        if(isset($validated['gender'])) $user->gender = $validated['gender'];
        if(isset($validated['phone'])) $user->userExtra->phone = $validated['phone'];
        if(isset($validated['nid'])) $user->userExtra->nid = $validated['nid'];
        if(isset($validated['email'])) $user->email = $validated['email'];
        if(isset($validated['facebook'])) $user->userExtra->facebook = $validated['facebook'];
        if(isset($validated['twitter'])) $user->userExtra->twitter = $validated['twitter'];
        
        if(isset($validated['current_holding'])) $user->currentAddress()->holding = $validated['current_holding'];
        if(isset($validated['current_road'])) $user->currentAddress()->road = $validated['current_road'];
        if(isset($validated['current_post_code'])) $user->currentAddress()->post_code = $validated['current_post_code'];
        if(isset($validated['current_upazilla'])) $user->currentAddress()->upazilla = $validated['current_upazilla'];
        if(isset($validated['current_district'])) $user->currentAddress()->district = $validated['current_district'];
        if(isset($validated['current_country'])) $user->currentAddress()->country_id = $validated['current_country'];
        
        if(isset($validated['permanent_holding'])) $user->permanentAddress()->holding = $validated['permanent_holding'];
        if(isset($validated['permanent_road'])) $user->permanentAddress()->road = $validated['permanent_road'];
        if(isset($validated['permanent_post_code'])) $user->permanentAddress()->post_code = $validated['permanent_post_code'];
        if(isset($validated['permanent_upazilla'])) $user->permanentAddress()->upazilla = $validated['permanent_upazilla'];
        if(isset($validated['permanent_district'])) $user->permanentAddress()->district = $validated['permanent_district'];
        if(isset($validated['permanent_country'])) $user->permanentAddress()->country_id = $validated['permanent_country'];
        
        if(isset($validated['careof'])) $user->userExtra->careof = $validated['careof'];
        if(isset($validated['careof_phone'])) $user->userExtra->careof_phone = $validated['careof_phone'];

        
        $saved = $user->push();
        // $req->user_panel_fraction = 'alls';
        if($saved){
            // if there's an origUrl, then after making edition to profile app will go to
            // that origUrl.
            if($request->origUrl) return redirect($request->origUrl);
            
            if(Auth::user()->id !== $id){
                // returns to users table in admin panel from this 'if block'
                // the 'user_panel_fraction' is uploaded from user-panel blade
                // so that after updating user information the admin can go to 
                // the appropriate original section of user-panel.
                return redirect('/dashboard/admin/users-panel/' . $request->user_panel_fraction)->with('success', $request->profileItem . ' has been updated');
            }
            else {
                // returns to client profile from this else block
                return redirect(route('user.show'))->with('success', $request->profileItem . ' has been updated');
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
    
    //------- client updates ------------------------------------
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
    //------- client updates ends ------------------------------------
    
    
    /*
     * ------- admin updates to volunteer ------------------------------------
     * an admin performs four actions with this method. admin can:
     * 1. approve a volunteer request (setting is_volunteer to 2 from volunteer request)
     * 2. cancel a volunteer request (setting is_volunteer to 0 from volunteer request)
     * 3. remove a volunteer (setting is_volunteer to 3 from volunteer)
     * 4. remake a volunteer (setting is_volunteer to 2 from any status)
     * this value caome via update_volunteer parameter
     */
    public function updateVolunteer(Request $request) {
        $rules = [
            'user_id' => 'numeric',
            'update_volunteer' => 'numeric',
        ];
        $validated = $this->validate($request, $rules);

        $user = User::find($validated['user_id']);
        $user->is_volunteer = $validated['update_volunteer'];
        $updated = $user->update();
        
        if($updated){
            return redirect()->back();
        }
    }
    
    /*
     * ------- admin updates active status ------------------------------------
     * an admin performs three actions with this method. admin can:
     * 1. block an user (setting active_status to 3 from active)
     * 2. mark an user as malicous (setting active_status to 2 from active)
     * 3. make an user alive (setting active_status to 1 from block)
     * this value caome via update_active_status parameter
     */
    public function updateActiveStatus(Request $request) {
        $rules = [
            'user_id' => 'numeric',
            'update_active_status' => 'numeric',
        ];
        $validated = $this->validate($request, $rules);

        $user = User::find($validated['user_id']);
        $user->active_status = $validated['update_active_status'];
        $updated = $user->update();
        
        if($updated){
            return redirect()->back();
        }
    }
    

    
    /**
     * admin deletes an user from database
     */
    public function destroy() {}
}
