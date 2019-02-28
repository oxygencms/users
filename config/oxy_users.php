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

    'admin_user_controller' => \Oxygencms\Users\Controllers\AdminUserController::class,
    'admin_user_controller_routes' => ['except' => ['show']],

    'permission_controller' => \Oxygencms\Users\Controllers\PermissionController::class,
    'permission_controller_routes' => ['except' => ['show']],

    'role_controller' => \Oxygencms\Users\Controllers\RoleController::class,
    'role_controller_routes' => ['except' => ['show']],


    /**
     * Models
     */
    'user_model' => \Oxygencms\Users\Models\User::class,
    'role_model' => \Oxygencms\Users\Models\Role::class,
    'permission_model' => \Oxygencms\Users\Models\Permission::class,

    /**
     * Policies
     */
    'user_policy' => \Oxygencms\Users\Policies\UserPolicy::class,
    'role_policy' => \Oxygencms\Users\Policies\RolePolicy::class,
    'permission_policy' => \Oxygencms\Users\Policies\PermissionPolicy::class,

];