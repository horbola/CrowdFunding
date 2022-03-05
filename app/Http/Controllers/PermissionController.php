<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function __construct() {
        
    }

    public function index() {
        
    }

    public function create() {
        
    }

    public function store() {
        
    }
    
    public function storePermission() {
        // clearing tables
        Permission::truncate();
        Role::truncate();
        DB::table('users_roles')->truncate();
        DB::table('users_permissions')->truncate();
        DB::table('roles_permissions')->truncate();
        
        // permissions are being created
        $investigateCampaigner = new Permission();
        $investigateCampaigner->slug = 'investigate-campaigner';
        $investigateCampaigner->name = 'Investigate Campaigner';
        $investigateCampaigner->save();
        
        $createUser = new Permission();
        $createUser->slug = 'create-user';
        $createUser->name = 'Create User';
        $createUser->save();

        $editUser = new Permission();
        $editUser->slug = 'edit-user';
        $editUser->name = 'Edit User';
        $editUser->save();
        
        $createCampaign = new Permission();
        $createCampaign->slug = 'create-campaign';
        $createCampaign->name = 'Create Campaign';
        $createCampaign->save();
        
        $editCampaign = new Permission();
        $editCampaign->slug = 'edit-campaign';
        $editCampaign->name = 'Edit Campaign';
        $editCampaign->save();
        
        $managePayment = new Permission();
        $managePayment->slug = 'manage-fund';
        $managePayment->name = 'Manage Fund';
        $managePayment->save();
        
        $managePlatform = new Permission();
        $managePlatform->slug = 'manage-platform';
        $managePlatform->name = 'Manage Platform';
        $managePlatform->save();
        
        $createBlog = new Permission();
        $createBlog->slug = 'create-blog';
        $createBlog->name = 'Create Blog';
        $createBlog->save();

        // roles are being created
        $guest = new Role();
        $guest->slug = 'guest';
        $guest->name = 'Guest';
        $guest->save();
        
        $donor = new Role();
        $donor->slug = 'donor';
        $donor->name = 'Donor';
        $donor->save();
        
        $campaigner = new Role();
        $campaigner->slug = 'campaigner';
        $campaigner->name = 'Fund Raiser';
        $campaigner->save();
        
        $volunteer = new Role();
        $volunteer->slug = 'volunteer';
        $volunteer->name = 'Volunteer';
        $volunteer->save();
        
        $staff = new Role();
        $staff->slug = 'staff';
        $staff->name = 'Staff Admin';
        $staff->save();
        
        $super = new Role();
        $super->slug = 'super';
        $super->name = 'Super Admin';
        $super->save();
        
        
        // roles are being assined permissions
        $volunteer->permissions()->attach($investigateCampaigner);
        
        $super->permissions()->attach($investigateCampaigner);
        $super->permissions()->attach($createUser);
        $super->permissions()->attach($editUser);
        $super->permissions()->attach($createCampaign);
        $super->permissions()->attach($editCampaign);
        $super->permissions()->attach($managePayment);
        $super->permissions()->attach($managePlatform);
        $super->permissions()->attach($createBlog);
        
        // users are being assined roles and permissions
        $user1 = User::find(1);
        $user1->roles()->attach($guest);
        $user1->roles()->attach($donor);
        $user1->roles()->attach($campaigner);
        $user1->roles()->attach($volunteer);
        $user1->roles()->attach($staff);
        $user1->roles()->attach($super);
        $user1->permissions()->attach($investigateCampaigner);
        $user1->permissions()->attach($createUser);
        $user1->permissions()->attach($editUser);
        $user1->permissions()->attach($createCampaign);
        $user1->permissions()->attach($editCampaign);
        $user1->permissions()->attach($managePayment);
        $user1->permissions()->attach($managePlatform);
        $user1->permissions()->attach($createBlog);
        
        $user2 = User::find(2);
        $user2->roles()->attach($guest);
        $user2->roles()->attach($donor);
        $user2->roles()->attach($campaigner);
        
        $user3 = User::find(3);
        $user3->roles()->attach($guest);
        $user3->roles()->attach($donor);
        $user3->roles()->attach($campaigner);
        
        $user4 = User::find(4);
        $user4->roles()->attach($guest);
        $user4->roles()->attach($donor);
        $user4->roles()->attach($campaigner);
        
        $user5 = User::find(5);
        $user5->roles()->attach($guest);
        $user5->roles()->attach($donor);
        $user5->roles()->attach($campaigner);
        
        return redirect()->back();
    }
    
    
    

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
    }

}
