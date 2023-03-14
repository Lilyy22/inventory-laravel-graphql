<?php

namespace App\GraphQL\Mutations\Hrm\General;

use App\Repositories\Hrm\General\DepartmentRepository;
use Illuminate\Database\QueryException;

final class Insert_department
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            return (new DepartmentRepository)->create($args);

        }catch(QueryException)
        {
            return null;
        }
    }
}
