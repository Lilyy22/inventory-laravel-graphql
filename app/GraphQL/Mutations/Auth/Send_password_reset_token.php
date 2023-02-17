<?php

namespace App\GraphQL\Mutations\Auth;

use App\Events\SendMail;
use App\Models\PasswordReset;
use App\Models\User;
use App\Traits\GenerateToken;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class Send_password_reset_token
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
              $user = User::where('email', $args['email'])
                      ->firstOrFail();
  
              $token = $this->get_token();
              $this->store_password_reset_token($user, $token);
              SendMail::dispatch($user, $token);
      
              return ['message'=> 'We have sent email with verification code.'];
              
          }
          catch(ModelNotFoundException $e)
          {
              return ["message" => "Sign UP first."];
          }
    }
}
