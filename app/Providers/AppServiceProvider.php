<?php

namespace App\Providers;

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
//        if ($this->app->isLocal()) {
//            //if local register your services you require for development
//          //  $this->app->register('Barryvdh\Debugbar\ServiceProvider');
//            $this->app['request']->server->set('HTTPS', true);
//        }else{
//            //else register your services you require for production
//            $this->app['request']->server->set('HTTPS', true);
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->isLocal()) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
