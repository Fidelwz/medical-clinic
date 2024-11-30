<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        //
        $this->registerPolicies();

        

        Gate::define('haveaccess', function(User $user, $perm){

            if($user->fullAccess()){
                return true;
            }

            return $user->hasPermissionTo($perm);
        });

        /** Roles **/
        Gate::define('admin', function(User $user){
            return $user->hasRole('admin');
        });


     
        
        
         Gate::define('doctor', function(User $user){

            if($user->fullAccess()){
                return true;
            }
             return $user->hasPermissionTo(permission: 'patients.index');
         });


         Gate::define('secretary', function(User $user){

            if($user->fullAccess()){
                return true;
            }
             return $user->hasPermissionTo(permission: 'patients.index');
         });

         Gate::define('appointment', function(User $user){

            if($user->fullAccess()){
                return true;
            }
             return $user->hasPermissionTo(permission: 'patients.index');
         });


         Gate::define('office', function(User $user){

            if($user->fullAccess()){
                return true;
            }
             return $user->hasPermissionTo(permission: 'patients.index');
         });


         Gate::define('patients', function(User $user){

            if($user->fullAccess()){
                return true;
            }
             return $user->hasPermissionTo(permission: 'patients.index');
         });




         


    }
}
