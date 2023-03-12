<?php

namespace App\Policies;

use App\Models\Auth\User;
use App\Models\Hrm\General\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
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

    public function update(Employee $employee, User $user)
    {
        return $user->id == $employee->user_id;
    }
}
