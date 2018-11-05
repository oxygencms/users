<?php

namespace Oxygencms\Users;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
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
            ->name('admin.')
            ->namespace('Oxygencms\Users\Controllers')
            ->group(function () {
                Route::resource('role', 'RoleController', ['except' => 'show']);
                Route::resource('permission', 'PermissionController', ['except' => 'show']);
                Route::resource('user', 'AdminUserController', ['except' => 'show']);
            });

        // Social Login
        // TODO: move controllers here or extract package
        Route::middleware('web')->namespace('App\Http\Controllers\Auth')->group(function () {
            Route::get('social/{provider}', 'AuthController@redirectToProvider');
            Route::get('social/{provider}/callback', 'AuthController@handleProviderCallback');
        });

        if (file_exists(base_path('routes/users.php'))) {
            Route::middleware('web')->group(base_path('routes/users.php'));
        } else {
            Route::middleware('web')->group(__DIR__.'/../routes.php');
        }
    }
}
