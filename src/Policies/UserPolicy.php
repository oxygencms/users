<?php

namespace Oxygencms\Users\Policies;

use App\Models\User;
use Oxygencms\Core\Policies\BasePolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function index(User $user)
    {
        if ($user->can('view_users') || $user->can('manage_users')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create_user') || $user->can('manage_users')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        if ($user->can('update_user') || $user->can('manage_users')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        if ($user->can('delete_user') || $user->can('manage_users')) {
            return true;
        }

        return false;
    }
}
