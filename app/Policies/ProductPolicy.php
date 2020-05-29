<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('product_list');
    }

    /**
     * Determine whether the user can create products.
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('product_add');
    }

    /**
     * Determine whether the user can update the product.
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('product_edit');
    }

    /**
     * Determine whether the user can delete the product.
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('product_delete');
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function restore(Member $member, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function forceDelete(Member $member, Product $product)
    {
        //
    }
}
