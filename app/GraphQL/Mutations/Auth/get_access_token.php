<?php

namespace App\GraphQL\Mutations\Auth;

use App\Services\Auth\JwtToken;

final class get_access_token
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $refreshToken = JwtToken::verifyRefreshToken($args['refresh_token']);
        
        if($refreshToken)
        {
            $accesstoken = JwtToken::accessToken($refreshToken->user);
            return ["message" => "expires after 30 minutes.", "access_token" => $accesstoken];
        }

        return ["message" => "Invalid Token"];
    }
}
