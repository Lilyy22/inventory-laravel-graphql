<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Repositories\Hrm\General\DepartmentRepository;
use Illuminate\Database\QueryException;

final class Update_department
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $dept_id = (new DepartmentRepository)->get($args['id']);
            return (new DepartmentRepository)->update($dept_id, $args);

        }catch(QueryException)
        {
            return null;
        }
    }
}
