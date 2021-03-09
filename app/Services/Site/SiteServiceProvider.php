<?php

namespace App\Services\Site;

use Illuminate\Support\ServiceProvider;

class SiteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('SiteService', function ($app) {
            return new SiteService($app);
        });
    }

    public function boot()
    {
        //
    }
}
