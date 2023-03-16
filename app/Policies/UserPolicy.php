<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Auth\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
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

    public function viewAll(User $user)
    {
        return $user->hasPermission('viewAll-user')
                    ? Response::allow()
                    : Response::deny('You do not have permission.');
    }

    public function view(User $user)
    {
        return $user->hasPermission('view-user')
                    ? Response::allow()
                    : Response::deny('You do not have permission.');
    }

    public function create(User $user)
    {
        return $user->hasPermissionThroughRole('create-user')
                    ? Response::allow()
                    : Response::deny('You do not have permission.');
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

    public function assign_role(User $user)
    {
        return $user->hasPermission('assign-role') 
                    ? Response::allow()
                    : Response::deny('You do not have permission.');
    }

    public function remove_role(User $user)
    {
        return $user->hasPermission('remove-role') 
                    ? Response::allow()
                    : Response::deny('You do not have permission.');
    }

}
