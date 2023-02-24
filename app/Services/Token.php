<?php

namespace App\Services;

class Token
{
    // generate a verification token
    public static function getToken()
    {
        return rand(10000, 99999);
    }

    // public function store_password_reset_token($user, $token)
    // {
    //     PasswordReset::updateOrCreate([
    //         'email' => $user->email], 
    //         [ 
    //             'token' => $token,
    //             'expiry_date' => CarbonImmutable::now()->addHour(1),
    //             'is_verified' => false,
    //         ]);

    //     return;
    // }

} 