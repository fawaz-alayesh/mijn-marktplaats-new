<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Advertenties;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class MyViewComposerServiceProvider extends ServiceProvider
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
         View::composer('*', function ($view) {
             $categories = Category::all();
             $view->with('categories', $categories);
         });
     }
     
}
