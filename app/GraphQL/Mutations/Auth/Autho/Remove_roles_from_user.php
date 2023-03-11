<?php

namespace App\GraphQL\Mutations\Auth\Autho;

use App\Repositories\Auth\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

final class Remove_roles_from_user
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $user =(new UserRepository)->get($args['user_id']);
            try
            {
                $user->removeRole($args['roles']);
                return ["message"=>"role removed"];
            
            }catch(QueryException)
            {
                return ["message"=> "Invalid role key."];
            }

        }catch(ModelNotFoundException)
        {
            return ["message"=> "Role not found"];
        }
    }
}
