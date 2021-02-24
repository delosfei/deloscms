<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
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
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Site::observe(\App\Observers\SiteObserver::class);



        //

        JsonResource::withoutWrapping();
        config(['sanctum.stateful' => array_merge(config('sanctum.stateful'), [request()->getHost()])]);
    }
}
