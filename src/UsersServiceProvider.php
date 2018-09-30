<?php

namespace Oxygencms\Users;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Oxygencms\Users\Middleware\UserResource;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'oxygencms');

        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/oxygencms'),
        ], 'views');

        $router->aliasMiddleware('personal', UserResource::class);
        $router->aliasMiddleware('permission', PermissionMiddleware::class);
        $router->aliasMiddleware('role', RoleMiddleware::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
