<?php

namespace App\GraphQL\Mutations\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            // $user = User::();
            // $user->update([
            //     'password' => Hash::make($args['confirmPassword']),
            // ]);

            return ["message" => "passwords is changed."];

        }else
        {
            return ["message" => "passwords donot match."];
        }
    }
}
