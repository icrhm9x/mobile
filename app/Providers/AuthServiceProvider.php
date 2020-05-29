<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineGateCategory();
        $this->defineGateProductType();
        $this->defineGateProduct();
        $this->defineGateRating();
        $this->defineGateOrder();
        $this->defineGateNews();
        $this->defineGateMember();
        $this->defineGateRole();
        $this->defineGatePermission();

    }

    public function defineGateCategory()
    {
        Gate::define('category_list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category_add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category_edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category_delete', 'App\Policies\CategoryPolicy@delete');
    }

    public function defineGateProductType()
    {
        Gate::define('productType_list', 'App\Policies\ProductTypePolicy@view');
        Gate::define('productType_add', 'App\Policies\ProductTypePolicy@create');
        Gate::define('productType_edit', 'App\Policies\ProductTypePolicy@update');
        Gate::define('productType_delete', 'App\Policies\ProductTypePolicy@delete');
    }

    public function defineGateProduct()
    {
        Gate::define('product_list', 'App\Policies\ProductPolicy@view');
        Gate::define('product_add', 'App\Policies\ProductPolicy@create');
        Gate::define('product_edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product_delete', 'App\Policies\ProductPolicy@delete');
    }

    public function defineGateRating()
    {
        Gate::define('rating_list', 'App\Policies\RatingPolicy@view');
    }

    public function defineGateOrder()
    {
        Gate::define('order_list', 'App\Policies\OrderPolicy@view');
        Gate::define('order_status', 'App\Policies\OrderPolicy@status');
        Gate::define('order_detail', 'App\Policies\OrderPolicy@detailOrder');
        Gate::define('order_delete', 'App\Policies\OrderPolicy@delete');
    }

    public function defineGateNews()
    {
        Gate::define('news_list', 'App\Policies\NewsPolicy@view');
        Gate::define('news_add', 'App\Policies\NewsPolicy@create');
        Gate::define('news_edit', 'App\Policies\NewsPolicy@update');
        Gate::define('news_delete', 'App\Policies\NewsPolicy@delete');
    }

    public function defineGateMember()
    {
        Gate::define('member_list', 'App\Policies\MemberPolicy@view');
        Gate::define('member_add', 'App\Policies\MemberPolicy@create');
        Gate::define('member_edit', 'App\Policies\MemberPolicy@update');
        Gate::define('member_delete', 'App\Policies\MemberPolicy@delete');
    }

    public function defineGateRole()
    {
        Gate::define('role_list', 'App\Policies\RolePolicy@view');
        Gate::define('role_add', 'App\Policies\RolePolicy@create');
        Gate::define('role_edit', 'App\Policies\RolePolicy@update');
        Gate::define('role_delete', 'App\Policies\RolePolicy@delete');
    }

    public function defineGatePermission()
    {
        Gate::define('permission_list', 'App\Policies\PermissionPolicy@view');
        Gate::define('permission_add', 'App\Policies\PermissionPolicy@create');
        Gate::define('permission_edit', 'App\Policies\PermissionPolicy@update');
        Gate::define('permission_delete', 'App\Policies\PermissionPolicy@delete');
    }
}
