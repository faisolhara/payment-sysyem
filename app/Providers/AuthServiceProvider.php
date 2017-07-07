<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Doctrine\ORM\EntityManagerInterface;
use App\Entities\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
    protected $userAccess;

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('access', function ($user, $resource, $privilege) {
            foreach ($user->getRole()->getAccessControl() as $accessControl) {
                if($accessControl->getResource() == $resource && $accessControl->getPrivilege() == $privilege){
                    return TRUE;
                }
            }
            return FALSE;
        });
    }
}
