<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class Ping
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Auth::check() ? 'Authenticated' : 'Unauthenticated';
    }
}
