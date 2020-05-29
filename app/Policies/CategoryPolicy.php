<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the category.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('category_list');
    }

    /**
     * Determine whether the user can create categories.
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('category_add');
    }

    /**
     * Determine whether the user can update the category.
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('category_edit');
    }

    /**
     * Determine whether the user can delete the category.
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('category_delete');
    }

    /**
     * Determine whether the user can restore the category.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Category  $category
     * @return mixed
     */
    public function restore(Member $member, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the category.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Category  $category
     * @return mixed
     */
    public function forceDelete(Member $member, Category $category)
    {
        //
    }
}
