<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $table = 'members';

    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    protected $hidden = [
        'password',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'member_role', 'member_id', 'role_id')->withTimestamps();
    }

    public function checkPermissionAccess($permissionCheck)
    {
        $roles = auth()->user()->roles;
        if(auth()->id() == 1) {
            return true;
        }
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('key_code', $permissionCheck)) {
                return true;
            }
        }
        return false;
    }
}
