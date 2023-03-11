<?php

namespace App\GraphQL\Mutations\Auth;

use App\Events\RegisteredUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Auth\EmailVerificationRepository;
use App\Repositories\Auth\UserRepository;
use App\Services\Auth\RandToken;
 
final class Resend_verification_email
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $user = (new UserRepository)->getUnverifiedUser($args['email']);
            $token = RandToken::getToken();

            (new EmailVerificationRepository)->updateOrCreate($user, $token);
            RegisteredUser::dispatch($user, $token);
    
            return ['message'=> 'We have sent email with verification code.'];
            
        }
        catch(ModelNotFoundException $e)
        {
            return ["message" => "Can not send verification email."];
        }
    }
}
