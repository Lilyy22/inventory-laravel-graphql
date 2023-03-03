<?php

namespace App\GraphQL\Mutations\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Auth\UserRepository;
use App\Services\Auth\JwtToken;
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
                if($user->is_active())
                {
                    $access_token = JwtToken::accessToken($user);
                    $refresh_token = JwtToken::refreshToken($user);
                
                    JwtToken::storeRefreshToken($refresh_token, JwtToken::$refresh_exp, $user->id);

                    return ["access_token" => $access_token, 
                            "refresh_token"=> $refresh_token, 
                            "message"=> "access token expires in 15 min"];
                }
                
                return ["message"=> "email not verified"];

            }
            
            return ["message" => "credentials do not match."]; 

        }catch(ModelNotFoundException $e)
        {
            return ["message" => "credentials do not match."];
        }

    }

}
