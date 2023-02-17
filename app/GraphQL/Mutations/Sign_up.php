<?php

namespace App\GraphQL\Mutations;
use App\Models\User as users;
use Illuminate\Support\Facades\Hash;
use App\Events\SignUp;
use App\Models\EmailVerification;
use Carbon\CarbonImmutable;
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
        
        $token = $this->get_token();
        // $verification_link = env('APP_URL') . ":8000/verify-email/$token";
        $this->store_token($user, $token);
        SignUp::dispatch($user, $token);

         return ['message'=> 'We have send email with verification code.'];
        // return 'We have sent email with verification code.';

    }


    // generate a verification token
    public function get_token()
    {
        // $token = Hash::make(Str::random(24));
        // $token = str_replace('/', '_', $token);
        $token = rand ( 10000 , 99999 );
        return $token;
    }


    //store token along with user unique email for authorization
    public function store_token($user, $token)
    {
        EmailVerification::create([
            'email' => $user->email,
            'token' => $token,
            'expiry_date' => CarbonImmutable::now()->add(1, 'day'),
            'is_verified' => false,
        ]);

        return;
    }
}
