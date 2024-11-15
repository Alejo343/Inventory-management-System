<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('is-admin', function ($user) {
            return $user->role->value == 0;
        });

        Gate::before(function ($user, $ability) {
            if ($user->role->value === 0) {
                return true;
            }
        });

        Gate::define('is-invt-manager', function ($user) {
            return $user->role->value == 1;
        });

        Gate::define('is-sales-user', function ($user) {
            return $user->role->value == 2;
        });
    }
}
