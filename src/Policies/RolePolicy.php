<?php

namespace Oxygencms\Users\Policies;

use Oxygencms\Users\Models\User;
use Oxygencms\Core\Policies\BasePolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function index(User $user)
    {
        if ($user->can('see_roles') || $user->can('manage_roles')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create_role') || $user->can('manage_roles')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        if ($user->can('update_role') || $user->can('manage_roles')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        if ($user->can('delete_role') || $user->can('manage_roles')) {
            return true;
        }

        return false;
    }
}
