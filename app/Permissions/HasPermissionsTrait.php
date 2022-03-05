<?php

namespace App\Permissions;

use App\Models\Role;
use App\Models\Permission;



trait HasPermissionsTrait {
    
    public function roles() {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function hasRole(...$roles) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
    
    public function roleDesc($super, $staff, $voluntier, $campaigner, $donor, $guest) {
        if ($this->roles->contains('slug', $super)) {
            return 'Honorable Super Admin';
        }
        else if ($this->roles->contains('slug', $staff)) {
            return 'Honorable Admin';
        }
        else if ($this->roles->contains('slug', $voluntier)) {
            return 'Honorable Voluntier';
        }
        else if ($this->roles->contains('slug', $campaigner)) {
            return 'Honorable Campaigner';
        }
        else if ($this->roles->contains('slug', $donor)) {
            return 'Honorable Donor';
        }
        else if ($this->roles->contains('slug', $guest)) {
            return 'Honorable Guest';
        }
        return '';
    }
    
    public function getAllRoles (array $roles) {
        return Role::whereIn('slug', $roles)->get();
    }
    
    public function withdrawRolesTo(...$roles) {
        $roles = $this->getAllRoles($roles);
        $this->roles()->detach($roles);
        return $this;
    }
    
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
    
    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }
    
    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function givePermissionsTo(...$permissions) {
        $permissions = $this->getAllPermissions($permissions);
        dd($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }
    
    protected function getAllPermissions(array $permissions) {
        return Permission::whereIn('slug', $permissions)->get();
    }

    public function withdrawPermissionsTo(...$permissions) {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(...$permissions) {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
}
