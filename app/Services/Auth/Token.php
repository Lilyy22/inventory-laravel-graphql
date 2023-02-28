<?php

namespace App\Services\Auth;

class Token
{
    // generate a verification token
    public static function getToken()
    {
        return rand(10000, 99999);
    }

} 