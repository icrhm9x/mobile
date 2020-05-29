<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\Rating;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the rating.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('rating_list');
    }

    /**
     * Determine whether the user can create ratings.
     */
    public function create(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can update the rating.
     */
    public function update(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can delete the rating.
     */
    public function delete(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can restore the rating.
     */
    public function restore(Member $member, Rating $rating)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the rating.
     */
    public function forceDelete(Member $member, Rating $rating)
    {
        //
    }
}
