<?php

namespace App\GraphQL\Mutations\Auth\Autho;

use App\Models\Auth\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

final class Assign_permissions_to_role
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $role = Role::findOrFail($args['role_id']);
            try
            {
                $role->givePermission($args['permissions']);
                return ["message"=>"permission assigned"];
            
            }catch(QueryException)
            {
                return ["message"=> "Invalid permisson key."];
            }

        }catch(ModelNotFoundException)
        {
            return ["message"=> "Role not found"];
        }
    }
}
