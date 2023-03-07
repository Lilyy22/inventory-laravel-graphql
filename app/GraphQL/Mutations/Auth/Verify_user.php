<?php

namespace App\GraphQL\Mutations\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use App\Repositories\Auth\EmailVerificationRepository;
use App\Events\VerifiedUser;

final class Verify_user
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try
        {
            $email_verification = (new EmailVerificationRepository)->getEmail($args['token']);
                    
            if($email_verification->is_expired())
            {
                return ["message" => "token has expired."];
            }
            else
            {
                $email_verification->user()->update(['email_verified_at' => Carbon::now()]);
                //pass the user to the event
                VerifiedUser::dispatch($email_verification->user);
                
                return ["message" => "Account verified!"];
            }
        }
        catch(ModelNotFoundException $e)
        {
            return ["message" => "Invalid token!"];
        }

    }
}

