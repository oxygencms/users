<?php

namespace Oxygencms\Users;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Oxygencms\Users\Middleware\UserResource;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Oxygencms\Users\Contracts\Admin\UserRequestInterface;

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
        ], 'factories');

        $this->publishes([__DIR__.'/../config' => config_path()], 'config');

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
        $this->mergeConfigFrom(__DIR__.'/../config/oxy_users.php', 'oxy_users');

//        $this->app->bind(UserRequestInterface::class, function()
//        {
//            $concrete = config('oxy_users.admin_form_request_class');
//
//            return new $concrete;
//        });

        $this->app->bind(UserRequestInterface::class, config('oxy_users.admin_form_request_class'));

        $this->app->register(AuthServiceProvider::class);

        $this->app->register(RouteServiceProvider::class);
    }
}
