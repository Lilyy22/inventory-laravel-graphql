<?php

namespace App\GraphQL\Mutations\Auth;

use App\Repositories\Auth\UserRepository;
use App\Services\Auth\Jwt;
use App\Services\Auth\JwtToken;

final class get_refresh_token
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $payload = JwtToken::verifyRefreshToken($args['refresh_token']);
        if($payload)
        {
            return JwtToken::accessToken(UserRepository::get($payload['user_id']));
        }

        return "Invalid Token";
    }
}
