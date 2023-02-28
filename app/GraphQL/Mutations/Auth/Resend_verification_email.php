<?php

namespace App\GraphQL\Mutations\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Events\SendMail;
use App\Repositories\Auth\EmailVerificationRepository;
use App\Services\Auth\Token;
 
final class Resend_verification_email
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        try
        {
            //throw Modelnotfound exception
            $email = (new EmailVerificationRepository)->getUnverifiedToken($args['email']);

            $token = Token::getToken();
            (new EmailVerificationRepository)->updateToken($email->user, $token);
            //send email
            SendMail::dispatch($email->user, $token);
    
            return ['message'=> 'We have sent email with verification code.'];
            
        }
        catch(ModelNotFoundException $e)
        {
            return ["message" => "Can not send verification email."];
        }
    }
}
