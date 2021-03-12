<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\Module::class => \App\Policies\ModulePolicy::class,
		 \App\Models\GroupPackage::class => \App\Policies\GroupPackagePolicy::class,
		 \App\Models\Group::class => \App\Policies\GroupPolicy::class,
		 \App\Models\Attachment::class => \App\Policies\AttachmentPolicy::class,
		 \App\Models\SystemConfig::class => \App\Policies\SystemConfigPolicy::class,
		 \App\Models\Package::class => \App\Policies\PackagePolicy::class,
		 \App\Models\Site::class => \App\Policies\SitePolicy::class,
		 \App\Models\User::class => \App\Policies\UserPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
