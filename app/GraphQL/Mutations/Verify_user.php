<?php

namespace App\GraphQL\Mutations;
use App\Models\User;
use App\Models\EmailVerification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

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
            $email_verification = EmailVerification::where('token', $args['token'])
                    ->firstOrFail();

            if(Carbon::now()->greaterThan($email_verification->expiry_date))
            {
                return ["message" => "token has expired."];
            }
            else
            {
                //update user email_verified_at to current date
                $email_verification->user()->update(['email_verified_at' => Carbon::now()]);
                $email_verification->update(['is_verified' => true]);

                return ["message" => "User account is verified."];
            }
        }
        catch(ModelNotFoundException $e)
        {
            return ["message" => "Invalid token!"];
        }

    }
}

