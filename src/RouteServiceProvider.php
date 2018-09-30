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
                Route::resource('user', 'AdminUserController', ['except' => 'show']);
            });

        // Social Login
        Route::middleware('web')->namespace('App\Http\Controllers\Auth')->group(function () {
            Route::get('social/{provider}', 'AuthController@redirectToProvider');
            Route::get('social/{provider}/callback', 'AuthController@handleProviderCallback');
        });

        Route::middleware('web')->namespace($this->namespace)->group(function () {

            // User profiles
            Route::prefix('user/{user}')->as('user.')->middleware(['auth', 'personal'])->group(function () {

                // Dashboard
                Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

                // Profile
                Route::get('profile', 'UserController@profile')->name('profile');

                // Update user's personal information
                Route::patch('profile', 'UserController@profileUpdate')->name('profile.update');

                // Update user's password
                Route::patch('password', 'UserController@passwordUpdate')->name('password.update');
            });
        });
    }
}
