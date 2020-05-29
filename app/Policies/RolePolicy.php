<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('role_list');
    }

    /**
     * Determine whether the user can create roles.
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('role_add');
    }

    /**
     * Determine whether the user can update the role.
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('role_edit');
    }

    /**
     * Determine whether the user can delete the role.
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('role_delete');
    }

    /**
     * Determine whether the user can restore the role.
     */
    public function restore(Member $member, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the role.
     */
    public function forceDelete(Member $member, Role $role)
    {
        //
    }
}
