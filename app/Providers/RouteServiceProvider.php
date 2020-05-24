<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        //admin
        $this->mapAdminCategoryRoutes();
        $this->mapAdminProductTypeRoutes();
        $this->mapAdminProductRoutes();
        $this->mapAdminRatingRoutes();
        $this->mapAdminOrderRoutes();
        $this->mapAdminNewsRoutes();
        $this->mapAdminMemberRoutes();
        $this->mapAdminRoleRoutes();


        //client
        $this->mapClientHomeRoutes();
        $this->mapClientLoginLogoutRoutes();
        $this->mapClientCartRoutes();
        $this->mapClientNewsRoutes();
        $this->mapClientProductRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Admin
     */
    protected function mapAdminCategoryRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admins/category.php'));
    }

    protected function mapAdminProductTypeRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admins/productType.php'));
    }

    protected function mapAdminProductRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admins/product.php'));
    }

    protected function mapAdminRatingRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admins/rating.php'));
    }

    protected function mapAdminOrderRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admins/order.php'));
    }

    protected function mapAdminNewsRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admins/news.php'));
    }

    protected function mapAdminMemberRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admins/member.php'));
    }

    protected function mapAdminRoleRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'CheckLoginAdmin')
            ->namespace('App\Http\Controllers\Admin')
            ->group(base_path('routes/admins/role.php'));
    }

    /**
     * Client
     */
    protected function mapClientHomeRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Client')
            ->group(base_path('routes/clients/home.php'));
    }

    protected function mapClientLoginLogoutRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Client')
            ->group(base_path('routes/clients/login-logout.php'));
    }

    protected function mapClientCartRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Client')
            ->group(base_path('routes/clients/cart.php'));
    }

    protected function mapClientNewsRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Client')
            ->group(base_path('routes/clients/news.php'));
    }

    protected function mapClientProductRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers\Client')
            ->group(base_path('routes/clients/product.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
