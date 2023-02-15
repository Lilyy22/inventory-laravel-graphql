<?php

namespace App\GraphQL\Mutations;
use App\Models\User as users;
use Illuminate\Support\Facades\Hash;
use App\Events\SignUp;
use Illuminate\Support\Str;

final class Sign_up
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = users::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'role' => 'user',
            'password' => Hash::make($args['password']),
        ]);
        
        $token = Hash::make(Str::random(24));
        $token = str_replace('/', '_', $token);
        $verification_link = env('APP_URL') . ":8000/api/verify-email/$token";

        SignUp::dispatch($user, $verification_link);

        return $user;
       // SignUP::dispatch();
      // $verification_link = $this->send_email($user);

        // return response()
        //     ->json(['message'=> "please check your email we have sent a verification link.", "verification_link" => $verification_link]);
    }
}
