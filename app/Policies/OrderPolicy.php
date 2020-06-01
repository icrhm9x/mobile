<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('order_list');
    }

    /**
     * Determine whether the user can create orders.
     */
    public function status(Member $member)
    {
        return $member->checkPermissionAccess('order_status');
    }

    /**
     * Determine whether the user can update the order.
     */
    public function detailOrder(Member $member)
    {
        return $member->checkPermissionAccess('order_detail');
    }

    /**
     * Determine whether the user can delete the order.
     */
    public function cancel(Member $member)
    {
        return $member->checkPermissionAccess('order_cancel');
    }

    /**
     * Determine whether the user can restore the order.
     */
    public function restore(Member $member, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the order.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function forceDelete(Member $member, Order $order)
    {
        //
    }
}
