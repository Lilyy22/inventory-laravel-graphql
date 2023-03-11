<?php

namespace App\GraphQL\Mutations\Auth\Autho;

use App\Models\Auth\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class Delete_role
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
            $role->delete();

            return ["message"=>"Role is deleted"];

        }catch(ModelNotFoundException)
        {
            return ["message"=> "Role not found"];
        }
    }
}
