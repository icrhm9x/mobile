<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('client/layouts/header', function ($view) {
            $categories = Category::where('status', 1)->with('productTypes','products')->get();
            $view->with('categories', $categories);
        });
    }
}
