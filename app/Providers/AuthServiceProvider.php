<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Auth\Access\Gate;
use App\Models\User;
use App\Models\Commission;

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

        //Gate para que solo el admin pueda editar un producto
        Gate::define('edita-producto', function(User $user){
            return $user->rol == "admin";
        });

        //Gate para que solo el admin y el dueño puedan VER/EDITAR la comisión
        Gate::define('ver-edita-comision', function(User $user, Commission $commission){
            return ($user->id == $commission->user_id) || $user->rol == "admin";
        });

        //Gate para que el admin NO pueda ver los favoritos.
        Gate::define('ver-favoritos', function(User $user){
            return $user->rol != "admin";
        });
    }
}
