<?php

namespace App\GraphQL\Mutations\Auth;

use App\Repositories\Auth\PasswordResetRepository;
use App\Repositories\Auth\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class Reset_password
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
            $resetToken = (new PasswordResetRepository)->getEmail($args['token']);

            if($resetToken->is_expired())
            {
                return ["message" => "token has expired."];
            }
            else
            {
                if($args['newPassword'] == $args['confirmNewPassword'])
                {
                    (new UserRepository)->updatePassword($$resetToken->email, $args['newPassword']);

                    return ["message" => "password Updated."];
                }
            }

        }catch(ModelNotFoundException $e)
        {
            return ["message" => "Invalid Token!"];
        }
    
    }
}
