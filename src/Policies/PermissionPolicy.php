<?php

namespace Oxygencms\Users\Policies;

use Oxygencms\Users\Models\User;
use Oxygencms\Core\Policies\BasePolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function index(User $user)
    {
        if ($user->can('view_permissions') || $user->can('manage_permissions')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create_permission') || $user->can('manage_permissions')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        if ($user->can('update_permission') || $user->can('manage_permissions')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        if ($user->can('delete_permission') || $user->can('manage_permissions')) {
            return true;
        }

        return false;
    }
}
