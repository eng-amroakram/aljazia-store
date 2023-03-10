<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('is-admin', function ($user) {
            return $user->role->name === 'admin';
        });

        Gate::before(function ($user) {
            if ($user->role === 'superadmin') {
                return true;
            }
        });

        $roles = Role::all();

        foreach ($roles as $role) {
            Gate::define($role->name, function ($user) use ($role) {
                if (in_array($role->name, $user->getRolesNames())) {
                    return true;
                }else{
                    return false;
                }
            });
        }
    }
}
