<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Intervention\Image\Facades\Image;

use App\Models\User;
use App\Models\UserExtra;
use App\Models\Address;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Country;
use App\Models\Donation;
use App\Models\Campaign;
use App\Mail\VolunteerRequest;





class UserController extends Controller {

    /**
     * shows users panel from which different types of users will be viewed by admin.
     */
    public function indexUsersPanel(Request $request) {
        $title = 'Users Panel';
        $menuName = 'users';
        return view('user.users-panel', compact('request', 'title', 'menuName'));
    }
    
    public function adminUserSearch($status=null){
        $rules = ['q' => 'string:500', 'searching' => 'integer:1'];
        $validated = request()->validate($rules);

        if( is_numeric($validated['q']) ){
            $users = new Collection();
            $userExtra = UserExtra::where('phone', 'like', "%{$validated['q']}%")->
                    orWhere('nid', 'like', "%{$validated['q']}%")->paginate(15)->withQueryString();
            if ($userExtra->getCollection()->count()) {
                foreach ($userExtra->getCollection() as $ue) {
                    if( isset($status) ){
                        $user = User::where('id', $ue->user_id)->whereActiveStatus($status)->get()->first();
                        $users->push($user);
                    }
                    else {
                        $user = User::where('id', $ue->user_id)->get()->first();
                        $users->push($user);
                    }
                }
            }
            return $users = $userExtra->setCollection($users);
        }
        else {
            if( isset($status) ){
                return $users = User::where(function($query) use ($validated) {
                    $query->where('name', 'like', "%{$validated['q']}%")->
                    orWhere('email', 'like', "%{$validated['q']}%");
                })->where('active_status', $status)->paginate(15)->withQueryString();
            }
            else return $users = User::where('name', 'like', "%{$validated['q']}%")->
                    orWhere('email', 'like', "%{$validated['q']}%")->paginate(15)->withQueryString();
        }
    }
    
    /**
     * shows all users registered to this platform to an admin
     */
    public function indexAllUsers(Request $request) {
        $title = 'All Users';
        $menuName = 'users';
        $users = User::paginate(15);
        if (request()->searching) {
            $title = 'Searching All Users';
            $users = $this->adminUserSearch(null);
        }
        
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexBlockedUsers(Request $request) {
        $title = 'Blocked Users';
        $menuName = 'users';
        // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left
        $users = User::whereActiveStatus(3)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Blocked Users';
            $users = $this->adminUserSearch(3);
        }
        
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexActiveUsers(Request $request) {
        $title = 'Active Users';
        $menuName = 'users';
        // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left
        $users = User::whereActiveStatus(1)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Active Users';
            $users = $this->adminUserSearch(1);
        }
        
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexMalicousUsers(Request $request) {
        $title = 'Malicous Users';
        $menuName = 'users';
        $users = User::whereActiveStatus(2)->paginate(4);
        if (request()->searching) {
            $title = 'Searching Malicous Users';
            $users = $this->adminUserSearch(2);
        }
        
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexLeftUsers(Request $request) {
        $title = 'Left Users';
        $menuName = 'users';
        $users = User::whereActiveStatus(4)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Left Users';
            $users = $this->adminUserSearch(4);
        }
        
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexPausedUsers(Request $request) {
        $menuName = 'users';
        $title = 'Paused Users';
        $users = User::whereActiveStatus(5)->paginate(4);
        if (request()->searching) {
            $title = 'Searching Paused Users';
            $users = $this->adminUserSearch(5);
        }
        
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    
    
    
    
    /*
     * this method isn't used now. there mey be no easy way to detect the guest users
     */
    public function indexGuests(Request $request) {
        $menuName = 'users';
        $title = 'Guest Users';
        $users = User::paginate(15);
        $usersCollect = $users->getCollection()->filter(function($user, $key){
            return $user->hasRole('guest');
        });
        $users->setCollection($usersCollect);
        
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexDonors(Request $request) {
        $menuName = 'users';
        $title = 'Donors';
        $donations = Donation::paginate(15);
        $usersCollect = $donations->getCollection()->unique('user_id')->map(function($donation, $key){
            return $donation->donor;
        });
        $users = $donations->setCollection($usersCollect);
        
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexCampaigners() {
        $title = 'Campaigners';
        $menuName = 'users';
        $campaigns = Campaign::paginate(15);
        $usersCollect = $campaigns->getCollection()->unique('user_id')->map(function($campaign, $key){
            return $campaign->campaigner;
        });
        $users = $campaigns->setCollection($usersCollect);
        
        return view('user.users', compact('users', 'title', 'menuName'));
    }
 
    public function indexVolunteerRequests() {
        $title = 'Volunteer Requests';
        $menuName = 'users';
        $users = User::whereIsVolunteer(1)->paginate(15);
        return view('user.users', compact('users', 'title', 'menuName'));
    }
    
    public function indexVolunteers() {
        $title = 'Volunteers';
        $menuName = 'users';
        $users = User::whereIsVolunteer(2)->paginate(15);
        return view('user.users', compact('users', 'title', 'menuName'));
    }
    
    public function indexStaffs(Request $request) {
        $title = 'Admins';
        $menuName = 'users';
        $users = User::whereIsAdmin(1)->paginate(15);
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexSuper(Request $request) {
        $title = 'Super People';
        $menuName = 'users';
        $users = User::whereIsSuper(1)->paginate(15);
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    
    
    
    
    
    public function indexTopDonors(Request $request) {
        $title = 'Top Donors';
        $menuName = 'users';
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexTopActives(Request $request) {
        $title = 'Top Actie Users';
        $menuName = 'users';
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexTopSupporters(Request $request) {
        $title = 'Top Supporters';
        $menuName = 'users';
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    
    public function indexTopVisiters(Request $request) {
        $title = 'Top Visitors';
        $menuName = 'users';
        return view('user.users', compact('request', 'users', 'title', 'menuName'));
    }
    

    
    
    public function showMenu() {
        $menuName = '';
        return view('layout.dashboard-menu', compact('menuName'));
    }
    
    /**
     * 
     * @param type $userID
     * 
     * shows a single user's details
     */
    public function show(Request $request) {
        $title = 'Dashboard';
        $menuName = 'profile';
        $user = Auth::user();
        // if there's an id means this request is coming from admin
        // else is coming from client.
        if($request->id){
            $title = 'User Profile';
            $user = User::find($request->id);
        }
        
        return view('user.profile', compact('user', 'title', 'menuName'));
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
    public function edit(Request $request) {
        $title = 'Edit Profile';
        $menuName = 'profile';
        $user = Auth::user();
        // if there's an id means this request is coming from admin
        // else is coming from client.
        if($request->id && $user->id !== $request->id){
            $title = 'Edit Profile by Admin';
            $user = User::find($request->id);
        }
        
        $countries = Country::all();
        return view('user.profile-edit', compact('user', 'countries', 'title', 'menuName'));
    }
    
    
    public function update(Request $request) {
        $user = Auth::user();
        // if there's an id means this request is coming from admin
        // else is coming from client.
        if($request->id)
            $user = User::find($request->id);
        
        $validated = $this->UpdInfoValidn($request);
        if(isset($validated['name'])) $user->name = $validated['name'];
        if(isset($validated['gender'])) $user->gender = $validated['gender'];
        if(isset($validated['about'])) $user->about = $validated['about'];
        $userExtra = $this->isUserExtraData($validated, $user);
        $currAddr = $this->isCurrAddrData($validated, $user);
        $permAddr = $this->isPermAddrData($validated, $user);
        
        $saved = false;
        try {
            DB::transaction(function () use ($user, $userExtra, $currAddr, $permAddr) {
                $user->save();
                if($userExtra)
                    $userExtra->save();
                if($currAddr)
                    $currAddr->save();
                if($permAddr)
                    $permAddr->save();
            }, 3);
            $saved = true;
        } catch (\Exception $e) {
            $saved = false;
        }
        
        // $req->user_panel_fraction = 'alls';
        if($saved){
            // if there's an origUrl, then after making edition to profile app will go to
            // that origUrl.
            if($request->origUrl) return redirect($request->origUrl);
            
            $isAdmin = (Auth::user()->is_admin === 1);
            if( $isAdmin && $request->id ){
                // returns to users table in admin panel from this 'if block'
                // the 'user_panel_fraction' is uploaded from user-panel blade
                // so that after updating user information the admin can go to 
                // the appropriate original section of user-panel.
                return redirect('/dashboard/admin/users-panel/'.$request->user_panel_fraction.'?menuName=users')->with('success', 'Profile updated');
            }
            else if( !$request->id ) {
                // returns to client profile from this else block
//                return redirect(route('user.show', ['menuName'=> 'profile']))->with('success', $request->profileItem.' has been updated');
                return redirect(route('user.show', ['menuName'=> 'profile']))->with('success', 'Profile updated');
            }
        }
        return back()->with('error', 'Sorry the changes you are trying to make couldn\'t be possible');
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
            return redirect(route('user.show', ['menuName'=>'profile']))->with(['success' => 'Profile updated', 'user' => $user]);
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
            $user->refresh();
            Mail::to($user)->send(new VolunteerRequest($user));
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
    
    
    
    private function UpdInfoValidn($request) {
        $rules = [
            'name' => 'string:30',
            'birth_date' => 'date',
            'gender' => 'string:10',
            'phone' => 'string',
            'nid' => 'unique:user_extras|numeric',
            //'email' => 'email',
            'facebook' => 'string:50',
            'twitter' => 'nullable|string:50',
            'about' => 'string:500',
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
            'careof_phone' => 'string',
        ];
        return $request->validate($rules, $this->UpdInfoValidnMsg());
    }
    
    private function UpdInfoValidnMsg() {
        return $validnMsg = [
            'name.string' => 'Name should be in characters and must be within 30 characters',
            'birth_date.date' => 'Birth date should look like a date',
            'gender.string' => 'Gender code should be placed here',
            'phone.numeric' => 'Input your phone number in digits',
            'nid.numeric' => 'Input your NID number in digits',
            'nid.unique' => 'You must provide your nid number. Please provide only your own nid number',
            'facebook.string' => 'Facebook address is in characters',
            'twitter.string' => 'Twitter address is in characters',
            'about.string' => 'To write about yourself use only characters and numbers (if needed)',
            'current_holding.string' => 'Your current holding name can be in only numbers and characters',
            'current_road.string' => 'Your current road can be in only numbers and characters',
            'current_post_code.string' => 'Your current post code can be in only numbers and characters',
            'current_upazilla.string' => 'Your current upazila name can be in only numbers and characters',
            'current_district.string' => 'Your current district can be in only numbers and characters',
            'current_country.numeric' => 'Select your country',
            'permanent_holding.string' => 'Your permanent holding name can be in only numbers and characters',
            'permanent_road.string' => 'Your permanent road can be in only numbers and characters',
            'permanent_post_code.string' => 'Your permanent post code can be in only numbers and characters',
            'permanent_upazilla.string' => 'Your permanent upazila name can be in only numbers and characters',
            'permanent_district.string' => 'Your permanent district can be in only numbers and characters',
            'permanent_country.numeric' => 'Select your permanent country',
            'cateof.string' => 'Name of the person who is at your care, must be in characters',
            'cateof_phone.numeric' => 'Phone number of the person who is st your care, must be in digits',
        ];
    }
    
    private function isUserExtraData($validated, $user) {
        $isAvailable = isset($validated['birth_date']) ||
        isset($validated['phone']) ||
        isset($validated['nid']) ||
        isset($validated['facebook']) ||
        isset($validated['twitter']) ||
        isset($validated['careof']) ||
        isset($validated['careof_phone']);
        
        if($isAvailable){
            $userExtra = UserExtra::firstOrNew(['user_id' => $user->id]);
            if(isset($validated['birth_date'])) $userExtra->birth_date = $validated['birth_date'];
            if(isset($validated['phone'])) $userExtra->phone = $validated['phone'];
            if(isset($validated['nid'])) $userExtra->nid = $validated['nid'];
            if(isset($validated['facebook'])) $userExtra->facebook = $validated['facebook'];
            if(isset($validated['twitter'])) $userExtra->twitter = $validated['twitter'];
            if(isset($validated['careof'])) $userExtra->careof = $validated['careof'];
            if(isset($validated['careof_phone'])) $userExtra->careof_phone = $validated['careof_phone'];
            // $userExtra->save();
            return $userExtra;
        }
        return null;
    }
    
    private function isCurrAddrData($validated, $user) {
        $isAvailable = isset($validated['current_holding']) &&
            isset($validated['current_road']) &&
            isset($validated['current_post_code']) &&
            isset($validated['current_upazilla']) &&
            isset($validated['current_district']) &&
            isset($validated['current_country']);
        
        if($isAvailable){
            $currentAddress = Address::firstOrNew(['user_id' => $user->id, 'type' => 'current']);
            if(isset($validated['current_holding'])) $currentAddress->holding = $validated['current_holding'];
            if(isset($validated['current_road'])) $currentAddress->road = $validated['current_road'];
            if(isset($validated['current_post_code'])) $currentAddress->post_code = $validated['current_post_code'];
            if(isset($validated['current_upazilla'])) $currentAddress->upazilla = $validated['current_upazilla'];
            if(isset($validated['current_district'])) $currentAddress->district = $validated['current_district'];
            if(isset($validated['current_country'])) $currentAddress->country_id = $validated['current_country'];
            // $currentAddress->save();
            return $currentAddress;
        }
        return null;
    }
    
    private function isPermAddrData($validated, $user) {
        $isAvailable = isset($validated['permanent_holding']) &&
            isset($validated['permanent_road']) &&
            isset($validated['permanent_post_code']) &&
            isset($validated['permanent_upazilla']) &&
            isset($validated['permanent_district']) &&
            isset($validated['permanent_country']);
        
        if($isAvailable){
            $permanentAddress = Address::firstOrNew(['user_id' => $user->id, 'type' => 'permanent']);
            if(isset($validated['permanent_holding'])) $permanentAddress->holding = $validated['permanent_holding'];
            if(isset($validated['permanent_road'])) $permanentAddress->road = $validated['permanent_road'];
            if(isset($validated['permanent_post_code'])) $permanentAddress->post_code = $validated['permanent_post_code'];
            if(isset($validated['permanent_upazilla'])) $permanentAddress->upazilla = $validated['permanent_upazilla'];
            if(isset($validated['permanent_district'])) $permanentAddress->district = $validated['permanent_district'];
            if(isset($validated['permanent_country'])) $permanentAddress->country_id = $validated['permanent_country'];
            // $permanentAddress->save();
            return $permanentAddress;
        }
        return null;
    }
}
