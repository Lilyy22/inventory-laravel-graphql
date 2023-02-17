<?php

namespace App\Traits;


use App\Models\EmailVerification;
use App\Models\PasswordReset;
use Carbon\CarbonImmutable;

trait GenerateToken
{
    // generate a verification token
    public function get_token()
    {
        $token = rand ( 10000 , 99999 );
        return $token;
    }

    //store token along with user unique email for authorization
    public function store_token($user, $token)
    {
        EmailVerification::updateOrCreate([
                'email' => $user->email], 
            [ 
                'token' => $token,
                'expiry_date' => CarbonImmutable::now()->add(1, 'day'),
                'is_verified' => false,
            ]);

        return;
    }

    public function store_password_reset_token($user, $token)
    {
        PasswordReset::updateOrCreate([
            'email' => $user->email], 
            [ 
                'token' => $token,
                'expiry_date' => CarbonImmutable::now()->addHour(1),
                'is_verified' => false,
            ]);

        return;
    }
} 