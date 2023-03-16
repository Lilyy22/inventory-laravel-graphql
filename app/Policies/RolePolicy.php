<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Auth\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user)
    {
        return $user->hasPermission('delete-role')
                        ? Response::allow()
                        : Response::deny('You do not have Permission.');
    }

    public function assign_permission(User $user)
    {
        return $user->hasPermission('assign-permission') 
                    ? Response::allow()
                    : Response::deny('You do not have permission.');
    }

    public function remove_permission(User $user)
    {
        return $user->hasPermission('remove-permission') 
                    ? Response::allow()
                    : Response::deny('You do not have permission.');
    }
}
