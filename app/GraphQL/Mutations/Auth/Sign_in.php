<?php

namespace App\GraphQL\Mutations\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Auth\UserRepository;
use App\Services\Auth\Jwt;
use Illuminate\Http\Request;

final class Sign_in
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        try
        {
            $user = UserRepository::getUserByEmail($args['email']);

            if (password_verify($args['password'], $user->password))
            {
                $access_token = Jwt::encode(array('user_id'=> $user->id, "exp"=>"3s"), env('JWT_SECRET'));
                $refresh_token = Jwt::decode($access_token, env('JWT_SECRET'));
                
                return $user->is_active() ? 

                    ["access_token" => $access_token, "refresh_token"=> $refresh_token]: 
                    ["message"=> "email not verified", "access_token" => null];

            }else
            {
                return ["message" => "credentials do not match."];
            }  

        }catch(ModelNotFoundException $e)
        {
            return ["message" => "credentials do not match."];
        }

    }

    public function gettoken()
    {
        $request = new Request();
       return $request->bearerToken();
    }
}
