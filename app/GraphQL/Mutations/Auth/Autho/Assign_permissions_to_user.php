<?php

namespace App\GraphQL\Mutations\Auth\Autho;

use App\Repositories\Auth\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

final class Assign_permissions_to_user
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
                $user->givePermission($args['permissions']);
                return ["message"=>"permission assigned"];
            
            }catch(QueryException)
            {
                return ["message"=> "Invalid permisson key."];
            }

        }catch(ModelNotFoundException)
        {
            return ["message"=> "User not found"];
        }
    }
}
