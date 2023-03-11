<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Models\Hrm\General\Employee;
use App\Repositories\Hrm\General\EmployeeRepository;
use Illuminate\Support\Facades\Auth;

final class Insert_employee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if(Auth::check())
        {
             $employee = (new EmployeeRepository)->create($args, Auth::user());

             return[$employee];
        } 

        return['something went wrong'];
    }
}
