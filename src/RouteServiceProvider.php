<?php

namespace Oxygencms\Users;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Oxygencms\Users\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::middleware(['web', 'admin'])
            ->prefix('admin')
            ->namespace($this->namespace)
            ->group(function () {
                Route::resource('role', 'RoleController', ['except' => 'show']);
                Route::resource('permission', 'PermissionController', ['except' => 'show']);
                Route::resource('user', 'UserController', ['except' => 'show']);
            });
    }
}
