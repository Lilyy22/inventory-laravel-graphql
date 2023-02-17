<?php

namespace App\GraphQL\Mutations\Auth;

use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class Reset_password
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
            $check = PasswordReset::where('token', $args['token'])
                    ->firstOrFail();

            if(Carbon::now()->greaterThan($check->expiry_date))
            {
                return ["message" => "token has expired."];
            }
            else
            {
                
            }

        }catch(ModelNotFoundException $e)
        {
            return ["message" => "Not found."];
        }
      
        
    }
}
