<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\ProductType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product type.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('productType_list');
    }

    /**
     * Determine whether the user can create product types.
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('productType_add');
    }

    /**
     * Determine whether the user can update the product type.
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('productType_edit');
    }

    /**
     * Determine whether the user can delete the product type.
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('productType_delete');
    }

    /**
     * Determine whether the user can restore the product type.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\ProductType  $productType
     * @return mixed
     */
    public function restore(Member $member, ProductType $productType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the product type.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\ProductType  $productType
     * @return mixed
     */
    public function forceDelete(Member $member, ProductType $productType)
    {
        //
    }
}
