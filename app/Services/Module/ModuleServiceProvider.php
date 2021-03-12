<?php

namespace App\Services\Module;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('ModuleService', function ($app) {
            return new ModuleService($app);
        });
    }

    public function boot()
    {
        //
    }
}
