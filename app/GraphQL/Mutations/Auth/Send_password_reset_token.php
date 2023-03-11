<?php

namespace App\GraphQL\Mutations\Auth;

use App\Events\RegisteredUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Auth\PasswordResetRepository;
use App\Repositories\Auth\UserRepository;
use App\Services\Auth\RandToken;

final class Send_password_reset_token
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
              $user = (new UserRepository)->getUserByEmail($args['email']);
  
              $token = RandToken::getToken();
              (new PasswordResetRepository)->create($user->email, $token);
              RegisteredUser::dispatch($user, $token);
      
              return ['message'=> 'We have sent email with verification code.'];
              
          }
          catch(ModelNotFoundException $e)
          {
              return ["message" => "Credentials does not match our records"];
          }
    }
}
