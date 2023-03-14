<?php

namespace App\GraphQL\Queries\Hrm\General;

use App\Models\Hrm\General\Department;

final class Get_department
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return ["message" => Department::all()];
    }
}
