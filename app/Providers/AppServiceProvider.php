<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //when a user request an instance of stripe we call this function and return whatver
\App::bind('App\Billing\Stripe',function(){
 //config gets stuffs from config folder and then the file name
 return new \App\Billing\Stripe(config('services.stripe.key'));

});

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//boot happens when all providers have been registered

        //anywhere the sidebar is loaded make avilabe the archieve variable
        view()->composer('partials.archieve',function($view){
            //add variable archieve with its value loaded from App\Post
            $view->with('archieves',\App\Post::archieve());
        });

          Schema::defaultStringLength(191);
    }
}
