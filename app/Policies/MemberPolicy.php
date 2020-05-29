<?php

namespace App\Policies;

use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the member.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('member_list');
    }

    /**
     * Determine whether the user can create members.
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('member_add');
    }

    /**
     * Determine whether the user can update the member.
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('member_edit');
    }

    /**
     * Determine whether the user can delete the member.
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('member_delete');
    }

    /**
     * Determine whether the user can restore the member.
     */
    public function restore(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the member.
     */
    public function forceDelete(Member $member)
    {
        //
    }
}
