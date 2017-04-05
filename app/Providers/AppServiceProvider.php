<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     //* After all service providers have been registered Laravel will filter again and call boot.
     //* THis is a place where you can perform any action or logic with the assumption is already loaded.
    public function boot()
    {
        //* Register a view composer, with a view facade.
        //* we want "archives" in our blog to be visible everywhere this layout is shown.
        view()->composer('layouts.blog-sidebar', function($view) {
          //* We can hook up to when any view is loaded.
          //* The call back function binds $view to the variable 'archives'.
          $view->with('archives', \App\Post::archives());
        }); //* Now this view will have access to a collection of all posts.
    }

    /**
     * Register any application services.
     *
     * @return void
     */
     //* We can bind things itno the service container.
    public function register()
    {
        //
    }
}
