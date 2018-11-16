<?php

return [

    /*
    |--------------------------------------------------------------------------
    | IoC Bindings
    |--------------------------------------------------------------------------
    |
    | Specific abstract bindings to concrete classes.
    |
    */

    'admin_form_request_class' => \Oxygencms\Users\Requests\UserRequest::class,

    /*
    |--------------------------------------------------------------------------
    | Controllers and routes
    |--------------------------------------------------------------------------
    |
    | Update this config to rewrite the package controllers and routes.
    |
    */

    'public_user_controller' => \Oxygencms\Users\Controllers\UserController::class,
//    'public_user_routes' => ['except']

    'admin_user_controller' => \Oxygencms\Users\Controllers\AdminUserController::class,
    'admin_user_controller_routes' => ['except' => ['show']],

    'permission_controller' => \Oxygencms\Users\Controllers\PermissionController::class,
    'permission_controller_routes' => ['except' => ['show']],

    'role_controller' => \Oxygencms\Users\Controllers\RoleController::class,
    'role_controller_routes' => ['except' => ['show']],

];