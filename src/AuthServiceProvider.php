<?php

namespace Oxygencms\Users;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $config = config('oxy_users');

        $policies = [
            $config['user_model'] => $config['user_policy'],
            $config['role_model'] => $config['role_policy'],
            $config['permission_model'] => $config['permission_policy'],
        ];

        foreach ($policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }
}
