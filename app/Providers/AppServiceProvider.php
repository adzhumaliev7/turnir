<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        Paginator::useBootstrap();

       
        view()->composer(['admin.admin_layout'], function ($view) {
            $check = DB::table('model_has_roles')->where('model_id', Auth::user()->id)->where('role_id', 3)->exists();
            $orders = DB::table('orders')->where('status', 0)->count();
            $orders_team = DB::table('orders')->where('status', 0)->count();
            $view->with('check', $check)->with('orders', $orders)->with('orders_team', $orders_team);
        });
    }
}
