<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
            return $user->role->id == 1;
         });

         Gate::define('isDosen', function($user) {
             return $user->role->id == 2;
         });
         Gate::define('isMahasiswa', function($user) {
             return $user->role->id == 3;
         });
         Gate::define('isUser', function($user) {
            return $user->role->id == 4;
        });
         Gate::define('update-profile', function ($user,$id) {
             return $id==\Auth::user()->id;
         });
         Gate::define('update-catalog', function ($user, $catalog) {
            return $user->id === $catalog->user_id;
        });
    }
}
