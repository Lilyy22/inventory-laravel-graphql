<?php

namespace App\GraphQL\Mutations\Auth;
use App\Models\User;
use App\Repositories\Auth\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

final class Change_password
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        if($args['newPassword'] == $args['confirmPassword'])
        {
            //$user = Auth::user();
           (new UserRepository)->updatePassword('gelilahhamid2@gmail.com', $args['newPassword']);

            return ["message" => "password Updated."];

        }else
        {
            return ["message" => "password do not match."];
        }
    }
}
