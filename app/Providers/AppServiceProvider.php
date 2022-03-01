<?php

namespace App\Providers;

use App\Theme;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        //check if the app is in production env, and if it is, enforce https
        if(App::environment('production')) {
            //enforce https throughout the application
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $view->with('themes', Theme::all());
        });



        View::composer('*', function ($view) {
            $theme = Cookie::get('theme');
            $view->with('cookie', $theme);
        });
    }
}
