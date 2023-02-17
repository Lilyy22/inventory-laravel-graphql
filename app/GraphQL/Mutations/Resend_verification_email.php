<?php

namespace App\GraphQL\Mutations;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Events\SendMail;
use App\Models\EmailVerification;
use App\Traits\GenerateToken;

final class Resend_verification_email
{
    use GenerateToken;
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        try
        {
            $email = EmailVerification::where('email', $args['email'])
                    ->firstOrFail();

            $token = $this->get_token();
            $this->store_token($email->user, $token);
            SendMail::dispatch($email->user, $token);
    
            return ['message'=> 'We have sent email with verification code.'];
            
        }
        catch(ModelNotFoundException $e)
        {
            return ["message" => "Email address is not recognized."];
        }
    }
}
