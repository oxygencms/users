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
            ->group(function () {
                Route::resource(
                    'role',
                    config('oxy_users.role_controller'),
                    config('oxy_users.role_controller_routes')
                );

                Route::resource(
                    'permission',
                    config('oxy_users.permission_controller'),
                    config('oxy_users.permission_controller_routes')
                );

                Route::resource(
                    'user',
                    config('oxy_users.admin_user_controller'),
                    config('oxy_users.admin_user_controller_routes')
                );
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
