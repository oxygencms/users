<?php

namespace Oxygencms\Users;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Oxygencms\Users\Middleware\UserResource;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'oxygencms');

        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/oxygencms'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../routes.php' => base_path('routes/users.php'),
        ], 'routes');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/seeds/' => database_path('seeds')
        ], 'seeds');

        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories')
        ], 'seeds');

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
