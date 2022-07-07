<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Enums\{
    RolesEnum,
};


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
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

        /**
         * Role-based authorization services.
         */
        Gate::define('isAdmin', fn(User $user) => $user->roles->contains('name', RolesEnum::ADMIN->value));
        Gate::define('isDriver', fn(User $user) => $user->roles->contains('name', RolesEnum::DRIVER->value));
        Gate::define('isSupervisor', fn(User $user) => $user->roles->contains('name', RolesEnum::SUPERVISOR->value));
        Gate::define('isDispatcher', fn(User $user) => $user->roles->contains('name', RolesEnum::DISPATCHER->value));
    }
}
