<?php

namespace App\GraphQL\Mutations\Auth;

use App\Repositories\Auth\UserRepository;
use Illuminate\Support\Facades\Auth;

final class Change_password
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = Auth::user();//get current user

        if (password_verify($args['currentPassword'], $user->password))
        {
            if($args['newPassword'] == $args['confirmNewPassword'])
            {
               (new UserRepository)->updatePassword($user->email, $args['newPassword']);
    
                return ["message" => "password Updated."];
    
            }else
            {
                return ["message" => "password do not match."];
            }
        }
       
        return ["message" => "Incorrect password!"];
    }
}
