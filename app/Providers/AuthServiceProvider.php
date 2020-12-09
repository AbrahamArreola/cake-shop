<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
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
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-settings', function($user) {
            return $user->role->name == "admin";
        });

        Gate::define('client-settings', function($user) {
            return $user->role->name == "client";
        });

        Gate::define('can-access', function($user) {
            return $user->role->name == "admin" || $user->role->name == "client";
        });
    }
}
