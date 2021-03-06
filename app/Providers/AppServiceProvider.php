<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Module::observe(\App\Observers\ModuleObserver::class);
		\App\Models\GroupPackage::observe(\App\Observers\GroupPackageObserver::class);
		\App\Models\Group::observe(\App\Observers\GroupObserver::class);
		\App\Models\Attachment::observe(\App\Observers\AttachmentObserver::class);
		\App\Models\SystemConfig::observe(\App\Observers\SystemConfigObserver::class);
		\App\Models\Package::observe(\App\Observers\PackageObserver::class);
		\App\Models\Site::observe(\App\Observers\SiteObserver::class);

        JsonResource::withoutWrapping();
        config(['sanctum.stateful' => array_merge(config('sanctum.stateful'), [request()->getHost()])]);
    }
}
