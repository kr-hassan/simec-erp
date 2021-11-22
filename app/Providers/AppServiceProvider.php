<?php

namespace App\Providers;

use App\Models\MenuManager;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);

        view()->composer('partials.sidebar', function ($view) {
            $menus = MenuManager::whereNull('parent_id')->with('childs', function($query){
                $query->where('status', 1);
            })->where('status', 1)->get();

            $view->with('menus', $menus);
        });
    }
}
