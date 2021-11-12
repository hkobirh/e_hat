<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        $categories = Category::select( 'id', 'root', 'name', 'status', 'slug' )->where( 'status', 'active' )->where( 'root', 0 )->get();

        View::share( 'categories', $categories );
        Paginator::useBootstrap();
    }
}
