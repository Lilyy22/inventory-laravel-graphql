<?php

namespace App\GraphQL\Mutations\Auth\Autho;

use App\Repositories\Auth\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

final class Assign_roles_to_user
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
                $user->giveRole($args['roles']);
                return ["message"=>"role assigned"];
            
            }catch(QueryException)
            {
                return ["message"=> "Invalid role key."];
            }

        }catch(ModelNotFoundException)
        {
            return ["message"=> "User not found"];
        }
    }
}
