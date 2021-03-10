<?php

namespace App\Services\Upload;

use Illuminate\Support\ServiceProvider;

class UploadServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('UploadService', function ($app) {
            return new UploadService($app);
        });
    }

    public function boot()
    {
        //
    }
}
