<?php

namespace App\GraphQL\Mutations\Auth;

use App\Events\SendMail;
use App\Repositories\Auth\UserRepository;
use App\Services\Token;
use App\Repositories\Auth\EmailVerificationRepository;

final class Sign_up
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public function __invoke($_, array $args)
    {
        
        $user = UserRepository::create($args);
        $token = Token::getToken();
        //pass the user to the event
        SendMail::dispatch($user, $token);
        (new EmailVerificationRepository)->create($user, $token);

        return ['message'=> 'We have send email with verification code.'];
    }
}
