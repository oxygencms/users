<?php

namespace Oxygencms\Users;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\User' => 'Oxygencms\Users\Policies\UserPolicy',
        'Oxygencms\Users\Models\Role' => 'Oxygencms\Users\Policies\RolePolicy',
        'Oxygencms\Users\Models\Permission' => 'Oxygencms\Users\Policies\PermissionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
