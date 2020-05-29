<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the permission.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('permission_list');
    }

    /**
     * Determine whether the user can create permissions.
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('permission_add');
    }

    /**
     * Determine whether the user can update the permission.
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('permission_edit');
    }

    /**
     * Determine whether the user can delete the permission.
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('permission_delete');
    }

    /**
     * Determine whether the user can restore the permission.
     */
    public function restore(Member $member, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the permission.
     */
    public function forceDelete(Member $member, Permission $permission)
    {
        //
    }
}
