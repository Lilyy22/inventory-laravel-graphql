<?php

namespace App\GraphQL\Mutations\Auth;

use App\Repositories\Auth\PasswordResetRepository;
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
                return ["message" => $resetToken->email];
            }

        }catch(ModelNotFoundException $e)
        {
            return ["message" => "Not found."];
        }
      
        
    }
}
