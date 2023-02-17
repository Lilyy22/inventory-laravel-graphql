<?php

namespace App\GraphQL\Mutations\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Traits\GenerateToken;

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
            $user = User::where('email', $args['email'])->firstOrFail();

            if (password_verify($args['password'], $user->password))
            {
                return $user->is_active() ? ["message" => "Logged in"] : ["message" => "Email is not activated"] ;
            }else
            {
                return ["message" => "credentials do not match."];
            }

        }catch(ModelNotFoundException $e)
        {
            return ["message" => "credentials do not match."];
        }
    }
}
