<?php

namespace App\Services\Auth;

class RandToken
{
    public static function getToken()
    {
        return rand(10000, 99999);
    }

} 