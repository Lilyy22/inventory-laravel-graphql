<?php

namespace App\GraphQL\Mutations\Auth\Autho;

use App\Repositories\Auth\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

final class Remove_permissions_from_user
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
                $user->removePermission($args['permissions']);
                return ["message"=>"permission removed"];
            
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
