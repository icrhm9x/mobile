<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\News;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the news.
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('news_list');
    }

    /**
     * Determine whether the user can create news.
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('news_add');
    }

    /**
     * Determine whether the user can update the news.
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('news_edit');
    }

    /**
     * Determine whether the user can delete the news.
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('news_delete');
    }

    /**
     * Determine whether the user can restore the news.
     *
     * @param \App\Models\Member $member
     * @param \App\Models\News $news
     * @return mixed
     */
    public function restore(Member $member, News $news)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the news.
     *
     * @param \App\Models\Member $member
     * @param \App\Models\News $news
     * @return mixed
     */
    public function forceDelete(Member $member, News $news)
    {
        //
    }
}
