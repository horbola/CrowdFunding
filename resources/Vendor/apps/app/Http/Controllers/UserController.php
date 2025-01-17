<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function allUsers(){
        $users = User::all();
        $title = 'All Users';
        return view('admin.users', compact('users', 'title'));
    }
    public function userShow($id){
        $user = User::find($id);
        return view('admin.useredit', compact('user', 'id'));
    }
    public function profile(){
        $title = trans('app.profile');
        $user = Auth::user();
        return view('admin.profile', compact('title', 'user'));
    }

    public function profileEdit(){
        $title = trans('app.profile_edit');
        $user = Auth::user();
        $countries = Country::all();

        return view('admin.profile_edit', compact('title', 'user', 'countries'));
    }

    public function userEditPost(Request $request, $id){
        $user = User::find($id);
        //Validating
        $rules = [
            'email'    => 'required|email|unique:users,email,'.$user->id,
        ];
        $this->validate($request, $rules);
        $inputs = $request->input();
        // dd($inputs['name']);
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->phone = $inputs['phone'];
        $user->address = $inputs['address'];
        $user->active_status = $inputs['active_status'];
        $user->save();
        $notification = array(
            'message' => 'User Edited Successfully!', 
            'alert-type' => 'success'
        );
        return redirect(route('all-users'))->with( $notification);
    }

    public function profileEditPost(Request $request){
        $user = Auth::user();
        //Validating
        $rules = [
            'email'    => 'required|email|unique:users,email,'.$user->id,
        ];
        $this->validate($request, $rules);

        $inputs = array_except($request->input(), ['_token', 'photo']);
        // dd($inputs['name']);
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->country_id = $inputs['country_id'];
        $user->gender = $inputs['gender'];
        $user->phone = $inputs['phone'];
        $user->address = $inputs['address'];
        $user->save();

        if ($request->hasFile('photo')){
            $rules = ['photo'=>'mimes:jpeg,jpg,png'];
            $this->validate($request, $rules);

            $image = $request->file('photo');
            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
            $resized = Image::make($image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_name = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            $upload_dir = public_path('uploads/avatar/');
            if ( ! file_exists($upload_dir)){
                mkdir($upload_dir, 0777, true);
            }
            $imageFileName = $upload_dir.$image_name;

            try{
                //Uploading thumb
                $resized->save($imageFileName);

                $previous_photo= $user->photo;
                $user->photo = $image_name;
                $user->save();

                if ($previous_photo){
                    if (file_exists($upload_dir.$previous_photo)){
                        unlink($upload_dir.$previous_photo);
                    }
                }

            } catch (\Exception $e){
                return $e->getMessage();
            }

        }
        $notification = array(
            'message' => trans('app.profile_edit_success_msg'), 
            'alert-type' => 'success'
        );
        return redirect(route('profile'))->with($notification);
    }




    public function changePassword()
    {
        $title = trans('app.change_password');
        return view('admin.change_password', compact('title'));
    }

    public function changePasswordPost(Request $request)
    {
        if(config('app.is_demo')){
            return redirect()->back()->with('error', 'This feature has been disable for demo');
        }
        $rules = [
            'old_password'  => 'required',
            'new_password'  => 'required|confirmed',
            'new_password_confirmation'  => 'required',
        ];
        $this->validate($request, $rules);

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        //$new_password_confirmation = $request->new_password_confirmation;

        if(Auth::check())
        {
            $logged_user = Auth::user();

            if(Hash::check($old_password, $logged_user->password))
            {
                $logged_user->password = Hash::make($new_password);
                $logged_user->save();
                return redirect()->back()->with('success', trans('app.password_changed_msg'));
            }
            return redirect()->back()->with('error', trans('app.wrong_old_password'));
        }

    }
    
    

}
